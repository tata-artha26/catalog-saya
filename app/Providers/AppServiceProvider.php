<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Keranjang;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          // Kirim jumlah item keranjang ke navbar, di setiap halaman
    View::composer('partials.front.header', function ($view) {
        $view->with('jumlahKeranjang', Keranjang::totalItem());
    });
    }
}
