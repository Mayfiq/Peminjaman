<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\kategori;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function barang()
{
    $names = Barang::with(('kategori'))
    -> paginate(10);
  
    return view('names.index', compact('names'));
}
    public function create()
{
    $names = Barang::all();
    $kategoris = kategori::all();

    return view('names.create', compact('names','kategoris'));
}

public function store(Request $request)
{

    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'thumbnail'     =>  'required|image|mimes:jpeg,jpg,png|max:2048',
        'merk'     => 'required|min:5',
        'type'   => 'required|min:10',
        'kategori_id' => 'required'

    ]);
   //upload image
   $image = $request->file('thumbnail');
   $image->storeAs('public/posts', $image->hashName());

   //create post
   $name = barang::create([
       'thumbnail'     => $image->hashName(),
       'nama'     => $request->nama,
       'merk'     => $request->merk,
       'type'     => $request->type,
       'kategori_id'   => $request->kategori_id
   ]);

   

     $randomQrCodeName = Str::random(10) . '.png'; 
    $qrCodeData = QrCode::format('png')->generate((string)$name->id);
    $qrCodePath = 'qrcodes/' . $randomQrCodeName;
    Storage::disk('public')->put($qrCodePath, $qrCodeData);
    $name->update(['qrcode' => $qrCodePath]);
    return redirect(route('names.index'))->with('qrcode', $qrCodePath)->with('success', 'Name successfully saved.');
}
public function scanQR($id)
{
    $barang = Barang::findOrFail($id);

    if ($barang->status === 'available') {
        $barang->status = 'borrowed';
        $barang->save();
        return redirect()->route('names.index')->with('success', 'Item status updated to borrowed.');
    } elseif ($barang->status === 'borrowed') {
        $barang->status = 'available'; 
        $barang->save();
        return redirect()->route('names.index')->with('success', 'Item status updated to available.');
    } else {
        return redirect()->route('names.index')->with('error', 'Invalid item status.');
    }
}

public function downloadQR($id)
{
    $name = Barang::findOrFail($id);

    if ($name->qrcode) {
        $qrCodePath = 'public/' . $name->qrcode;
        $qrCodeContents = Storage::get($qrCodePath);

        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="' . $name->name . '_qrcode.png"',
        ];

        return Response::make($qrCodeContents, 200, $headers);
    } else {
        return redirect()->route('names.index')->with('error', 'QR Code not available for download.');
    }
}
public function showScanQRCode($id)
{
    $name = Barang::findOrFail($id);

    return view('scan_qr_code', compact('name'));
}

public function deletebarang($id)
{
    $name = Barang::find($id);
    // Hapus file foto dari server
    Storage::delete('public/posts/'. $name->thumbnail);


    $name->delete();
    return redirect()->back()->with('success', 'Barang berhasil dihapus');

}
public function editbarang($id)
    {
        $name = barang::find($id);
        $kategoris = kategori::all();
        $kt = barang::with('kategori')->find($id);
       


        return view('names.edit', compact('name','kategoris', 'kt'));

}
public function updt(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'merk' => 'required',
        'type' => 'required',
        'kategori_id' => 'required'
    ]);

    $data = barang::with('kategori')->find($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$data->image);

            //update post with new image
            $data->update([
                'thumbnail'     => $image->hashName(),
                'nama'     => $request->nama,
                'merk'     => $request->merk,
                'type'   => $request->type,
                'kategori_id' => $request->kategori_id
            ]);

        } else {

            //update post without image
            $data->update([
                'nama'     => $request->nama,
                'merk'     => $request->merk,
                'type'   => $request->type,
                'kategori_id' => $request->kategori_id
            ]);
        }

    return redirect()->route('names.index')->with('success', 'Data Berhasil Di Update');
}
}
