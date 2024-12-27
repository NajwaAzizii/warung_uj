<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiProdukController;
use Illuminate\Support\Facades\Route;

//halaman utama
Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');

//pencarian
Route::get('/search', [PembeliController::class, 'search'])->name('pembeli.search');

//detail produk
Route::get('/details/{produk:slug}', [PembeliController::class, 'details'])->name('pembeli.produk.details');
Route::get('/kategori/{kategori}', [PembeliController::class, 'kategori'])->name('pembeli.produk.kategori');
// Route::get('/keranjang/count', [KeranjangController::class, 'cartCount'])->name('keranjang.count');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('keranjangs', KeranjangController::class)->middleware('role:pembeli');
    Route::post('keranjang/add/{produkId}', [KeranjangController::class, 'store'])->middleware('role:pembeli')->name('keranjangs.store');

    Route::resource('transaksi_produk', TransaksiProdukController::class)->middleware('role:pemilik|pembeli');

    //semua yang ada di dalam route grop ini hanya bisa menagkses jika menambahkan path admin. 
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('produk', ProdukController::class)->middleware('role:pemilik');
        Route::resource('kategori', KategoriController::class)->middleware('role:pemilik');
    });
});

require __DIR__ . '/auth.php';
