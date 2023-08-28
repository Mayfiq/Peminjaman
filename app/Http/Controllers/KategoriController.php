<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori(Request $request)
    {
        $keyword = $request->keyword;
        $data = kategori::where('kategori', 'LIKE', '%'.$keyword.'%')
        -> paginate(10);
        return view('kategori.index', compact('data'));
    }
    public function tambahkategori()
    {
        $data = kategori::all();
        return view('kategori.tambah', compact('data'));
    }
    public function insertdatakategori(request $request)
    {
        $validatedata = $request->validate([
            'kategori' => 'unique:kategoris',
        ]);
        $data = kategori::create($request->all());

        return redirect()->route('kategori')->with('success', 'data Berhasil Ditambahkan');
    }

    public function tampilkandatakategori($id)
    {
        $data = kategori::find($id);
        // dd($data);
        return view('tampildatakategori', compact('data'));
    }
    public function deleted($id)
    {
        $data = kategori::find($id);
        $data->delete();
        return redirect()->route('kategori')->with('success', 'data Berhasil Di Hapus');
    }
}
