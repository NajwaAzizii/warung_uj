<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //semua yang ada di dalam route grop ini hanya bisa menagkses jika menambahkan path admin. 
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('produk', ProdukController::class)->middleware('role:pemilik');
        Route::resource('kategori', KategoriController::class)->middleware('role:pemilik');
    });
});

require __DIR__ . '/auth.php';
