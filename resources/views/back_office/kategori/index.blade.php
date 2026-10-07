@extends('back_office.layouts.app')

@section('judul', 'Kategori')
@section('judul-halaman', 'Kategori')

@section('konten')

    @include('back_office.partials.pesan')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Kategori</h3>
            <a href="{{ route('back_office.kategori.create') }}" class="btn btn-primary btn-sm">
                + Tambah Kategori
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th style="width:60px">No</th>
                        <th>Nama Kategori</th>
                        <th>Slug</th>
                        <th style="width:120px">Jumlah Produk</th>
                        <th style="width:170px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($daftarKategori as $nomor => $kategori)
                        <tr>
                            <td>{{ $nomor + 1 }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td><code>{{ $kategori->slug }}</code></td>
                            <td>{{ $kategori->produks_count }}</td>
                            <td>
                                <a href="{{ route('back_office.kategori.edit', $kategori) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('back_office.kategori.destroy', $kategori) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori {{ $kategori->nama_kategori }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-secondary">
                                Belum ada kategori. Silakan tambahkan terlebih dahulu.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
