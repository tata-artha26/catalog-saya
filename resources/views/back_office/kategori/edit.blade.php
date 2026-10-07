@extends('back_office.layouts.app')

@section('judul', 'Edit Kategori')
@section('judul-halaman', 'Edit Kategori')

@section('konten')

    @include('back_office.partials.pesan')

    <form action="{{ route('back_office.kategori.update', $kategori) }}" method="POST">
        @csrf
        @method('PUT')          {{-- ← wajib, jangan sampai lupa --}}

        <div class="card">
            <div class="card-header"><h3 class="card-title">Edit Kategori</h3></div>

            <div class="card-body">
                @include('back_office.kategori._form')
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('back_office.kategori.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>

@endsection
