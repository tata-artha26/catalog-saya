<?php

namespace App\Http\Controllers\BackOffice;

use App\Data\ProdukDummy;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
      $ringkasan = [
    'produk'       => Produk::count(),
    'kategori'     => Kategori::count(),
    'pesanan_baru' => Pesanan::where('status', 'baru')->count(),
    'admin_aktif'  => User::where('role', 'admin')->count(),
];

        return view('back_office.dashboard', compact('ringkasan'));
    }
}
