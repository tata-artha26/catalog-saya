<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\ProdukDummy;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $produk = ProdukDummy::tersedia();

        return view('home', [
            'produkPopuler' => array_slice($produk, 0, 4),
            'produkTerbaru' => array_slice($produk, 4, 4),
        ]);
    }
}