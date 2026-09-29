<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function tampilkanForm()
    {
        // Kalau sudah login, langsung antar ke dashboard
        if (Auth::check()) {
            return redirect()->route('back_office.dashboard');
        }

        return view('back_office.login');
    }

    /**
     * Memproses percobaan login.
     */
    public function proses(Request $request)
    {
        // 1. Periksa kelengkapan isian
        $kredensial = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak benar.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // 2. Cocokkan dengan data di tabel users
        if (! Auth::attempt($kredensial, $request->boolean('remember'))) {

            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->onlyInput('email');
        }

        // 3. Sudah benar, tapi apakah dia admin?
        if (! Auth::user()->isAdmin()) {

            Auth::logout();

            return back()
                ->withErrors(['email' => 'Akun ini tidak berhak mengakses back office.'])
                ->onlyInput('email');
        }

        // 4. Ganti ID session demi keamanan
        $request->session()->regenerate();

        return redirect()
            ->intended(route('back_office.dashboard'))
            ->with('sukses', 'Selamat datang kembali, ' . Auth::user()->name . '.');
    }

    /**
     * Keluar dari sistem.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('back_office.login')
            ->with('sukses', 'Anda sudah keluar dari sistem.');
    }
}
