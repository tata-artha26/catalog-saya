<?php

use App\Http\Controllers\BackOffice\AuthController;
use App\Http\Controllers\BackOffice\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/kontak', KontakController::class)->name('kontak');

Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/{produk}', [ProdukController::class, 'show'])->whereNumber('produk')->name('show');
});

Route::prefix('back-office')->name('back_office.')->group(function () {

    // Boleh diakses siapa saja
    Route::get('/login',  [AuthController::class, 'tampilkanForm'])->name('login');
    Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

    // Hanya untuk admin yang sudah login
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

    });
});
