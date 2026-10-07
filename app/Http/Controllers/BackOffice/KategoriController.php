<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarKategori = Kategori::withCount('produks')
                                  ->orderBy('nama_kategori')
                                  ->get();

        return view('back_office.kategori.index', compact('daftarKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('back_office.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $data = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:100', 'unique:kategoris,nama_kategori'],
            'deskripsi'     => ['nullable', 'string'],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique'   => 'Kategori dengan nama itu sudah ada.',
            'nama_kategori.max'      => 'Nama kategori maksimal 100 karakter.',
        ]);

        $data['slug'] = Str::slug($data['nama_kategori']);

        Kategori::create($data);

        return redirect()
            ->route('back_office.kategori.index')
            ->with('sukses', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
           return view('back_office.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
             $data = $request->validate([
            'nama_kategori' => [
                'required', 'string', 'max:100',
                'unique:kategoris,nama_kategori,' . $kategori->id,
            ],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $data['slug'] = Str::slug($data['nama_kategori']);

        $kategori->update($data);

        return redirect()
            ->route('back_office.kategori.index')
            ->with('sukses', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        // Jangan hapus kategori yang masih punya produk
        if ($kategori->produks()->count() > 0) {
            return redirect()
                ->route('back_office.kategori.index')
                ->with('gagal', 'Kategori tidak bisa dihapus karena masih memiliki produk.');
        }

        $kategori->delete();

        return redirect()
            ->route('back_office.kategori.index')
            ->with('sukses', 'Kategori berhasil dihapus.');

    }
}
