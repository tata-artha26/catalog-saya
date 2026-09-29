@extends('back_office.layouts.app')

@section('judul', 'Dashboard')
@section('judul-halaman', 'Dashboard')

@section('konten')

    {{-- Pesan sambutan setelah login berhasil --}}
    @if (session('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
    @endif

    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $ringkasan['produk'] }}</h3>
                    <p>Produk</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $ringkasan['kategori'] }}</h3>
                    <p>Kategori</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ $ringkasan['pesanan_baru'] }}</h3>
                    <p>Pesanan Baru</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>{{ $ringkasan['admin_aktif'] }}</h3>
                    <p>Admin Aktif</p>
                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Akun</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-0">
                <tr>
                    <th style="width:200px">Nama</th>
                    <td>{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <th>Peran</th>
                    <td>{{ ucfirst(auth()->user()->role) }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
