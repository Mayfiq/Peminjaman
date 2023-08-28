<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\BarangController;
use App\http\Controllers\KategoriController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin');
});
// routes/web.php

//input barang
Route::get('qrcode/{id}', [ItemController::class, 'showQrCode'])->name('qrcode');
route::get('/barang', [BarangController::class, 'barang'])->name('names.index');
route::get('/tambahbarang', [BarangController::class, 'create'])->name('tambahbarang');
route::post('/insertdatabarang', [BarangController::class, 'store'])->name('insertdatabarang');
Route::get('/deletebarang/{id}', [BarangController::class, 'deletebarang'])->name('deletebarang');
route::get('/editbarang/{id}', [BarangController::class, 'editbarang'])->name('editbarang');
route::post('/updt/{id}', [BarangController::class, 'updt'])->name('updt');

Route::get('names/scan/{id}', [BarangController::class, 'scanQR'])->name('names.scan');
Route::get('names/{id}/download', [BarangController::class, 'downloadQR'])->name('names.download');
Route::get('barang/scan/{id}', [BarangController::class, 'scanQR'])->name('names.scan');
Route::get('/scan-qr-code/{id}', [BarangController::class, 'showScanQRCode'])->name('scan.qr.code');
Route::post('/update-status/{id}', [BarangController::class, 'updateStatus'])->name('update.status');


//input kategori barang
route::get('/kategori', [KategoriController::class, 'kategori'])->name('kategori');
route::get('/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('tambahkategori');
route::post('/insertdatakategori', [KategoriController::class, 'insertdatakategori'])->name('insertdatakategori');
route::get('/tampilkandatakategori/{id}', [KategoriController::class, 'tampilkandatakategori'])->name('tampilkandatakategori');
route::get('/deleted/{id}', [KategoriController::class, 'deleted'])->name('deleted');
