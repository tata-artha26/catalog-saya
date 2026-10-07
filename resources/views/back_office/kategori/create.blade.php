@extends('back_office.layouts.app')

@section('judul', 'Tambah Kategori')
@section('judul-halaman', 'Tambah Kategori')

@section('konten')

    @include('back_office.partials.pesan')

    <form action="{{ route('back_office.kategori.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-header"><h3 class="card-title">Tambah Kategori</h3></div>

            <div class="card-body">
                @include('back_office.kategori._form')
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('back_office.kategori.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>

@endsection
