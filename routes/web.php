<?php

use App\Http\Controllers\BackOffice\AuthController;
use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BackOffice\ProdukController as ProdukBackOffice;
use App\Http\Controllers\BackOffice\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HalamanController::class, 'home'])->name('home');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// {produk:slug} artinya: carikan produk berdasarkan kolom slug
Route::get('/produk/{produk:slug}', [ProdukController::class, 'show'])->name('produk.show');

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
