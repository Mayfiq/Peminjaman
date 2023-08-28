<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode; //

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $item = Item::create($validatedData);

        $qrCode = QrCode::format('png')
            ->size(200)
            ->generate($item->id);

        // Save the QR code image or display it as needed

        return redirect()->route('items.index');
    }
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function showQrCode($id)
    {
        $qrCode = QrCode::format('png')
            ->size(200)
            ->generate($id);

        return response($qrCode)->header('Content-Type', 'image/png');
    }

}
