<?php

use App\Http\Controllers\BackOffice\AuthController;
use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BackOffice\ProdukController as ProdukBackOffice;
use App\Http\Controllers\BackOffice\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahasaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BackOffice\PesananController;


Route::get('/', [HalamanController::class, 'home'])->name('home');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// {produk:slug} artinya: carikan produk berdasarkan kolom slug
Route::get('/produk/{produk:slug}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/bahasa/{kode}', [BahasaController::class, 'ganti'])->name('bahasa.ganti');

Route::controller(KeranjangController::class)->prefix('keranjang')->name('keranjang.')->group(function () {

    Route::get('/',                    'index')->name('index');
    Route::post('/tambah/{produk}',    'tambah')->name('tambah');
    Route::patch('/{produk}',          'ubah')->name('ubah');
    Route::delete('/{produk}',         'hapus')->name('hapus');
    Route::delete('/',                 'kosongkan')->name('kosongkan');

});

Route::controller(CheckoutController::class)->prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/',        'index')->name('index');
    Route::post('/',       'proses')->name('proses');
    Route::get('/selesai/{pesanan:kode_pesanan}', 'selesai')->name('selesai');
});

Route::get('/pesanan',                  [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/{pesanan}',        [PesananController::class, 'show'])->name('pesanan.show');
Route::patch('/pesanan/{pesanan}/status', [PesananController::class, 'ubahStatus'])->name('pesanan.status');

Route::prefix('back-office')->name('back_office.')->group(function () {

    // Boleh diakses siapa saja
    Route::get('/login',  [AuthController::class, 'tampilkanForm'])->name('login');
    Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

    // Hanya untuk admin yang sudah login
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

         Route::resource('kategori', KategoriController::class)->except(['show']);
         Route::resource('produk', ProdukBackOffice::class)->except(['show']);
    });
});
