@extends('back_office.layouts.app')

@section('judul', 'Produk')
@section('judul-halaman', 'Produk')

@section('konten')

    @include('back_office.partials.pesan')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Produk</h3>
            <a href="{{ route('back_office.produk.create') }}" class="btn btn-primary btn-sm">
                + Tambah Produk
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th style="width:55px">No</th>
                        <th style="width:80px">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th style="width:70px">Stok</th>
                        <th style="width:90px">Status</th>
                        <th style="width:170px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($daftarProduk as $nomor => $produk)
                        <tr>
                            <td>{{ $daftarProduk->firstItem() + $nomor }}</td>

                            <td>
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                                         width="56" height="56" class="rounded"
                                         style="object-fit:cover" alt="{{ $produk->nama_produk }}">
                                @else
                                    <span class="text-secondary">—</span>
                                @endif
                            </td>

                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->kategori->nama_kategori }}</td>
                            <td>{{ $produk->hargaRupiah() }}</td>

                            <td class="{{ $produk->stok == 0 ? 'text-danger fw-bold' : '' }}">
                                {{ $produk->stok }}
                            </td>

                            <td>
                                <span class="badge {{ $produk->status == 'aktif' ? 'text-bg-success' : 'text-bg-secondary' }}">
                                    {{ ucfirst($produk->status) }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('back_office.produk.edit', $produk) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('back_office.produk.destroy', $produk) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk {{ $produk->nama_produk }}? Tindakan ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-secondary">
                                Belum ada produk. Silakan tambahkan terlebih dahulu.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $daftarProduk->links() }}
        </div>
    </div>

@endsection
