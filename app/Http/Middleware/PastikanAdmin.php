<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PastikanAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Belum login sama sekali
        if (! Auth::check()) {
            return redirect()->route('back_office.login');
        }

        // Sudah login, tapi bukan admin
        if (! Auth::user()->isAdmin()) {
            abort(403, 'Anda tidak berhak mengakses halaman ini.');
        }

        return $next($request);   // lolos, silakan lanjut
    }
}
