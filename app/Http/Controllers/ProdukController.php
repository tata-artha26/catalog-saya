<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\ProdukDummy;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index(): View
    {
        return view('produk.index', [
            'produks' => ProdukDummy::tersedia(),
        ]);
    }

    public function show(int $produk): View
    {
        $produk = ProdukDummy::cari($produk);

        abort_unless($produk, 404);

        return view('produk.show', [
            'produk' => $produk,
            'produkLain' => ProdukDummy::selain($produk['id']),
        ]);
    }
}