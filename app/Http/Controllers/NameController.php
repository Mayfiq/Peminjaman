<?php

namespace App\Http\Controllers;
use App\Models\Name;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NameController extends Controller
{
   

public function create()
{
    return view('names.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'foto'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'merk'     => 'required|min:5',
        'type'   => 'required|min:10',
        'seri'   => 'required|min:10',
        'warna'   => 'required|min:10'

    ]);
        
        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/foto', $image->hashName());
    $name = Name::create($validatedData);

    // Generate the QR code using the name's ID as the data
    $qrCodeData = QrCode::format('png')->generate((string)$name->id);
    $qrCodePath = 'qrcodes/' . $name->id . '.png';
    Storage::disk('public')->put($qrCodePath, $qrCodeData);
     $name->update(['qrcode' => $qrCodePath]);

    return redirect()->route('names.index')->with('qrcode', $qrCodePath)->with('success', 'Name successfully saved.');
}
}
