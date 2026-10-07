@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

@if (session('gagal'))
    <div class="alert alert-danger">{{ session('gagal') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $pesan)
                <li>{{ $pesan }}</li>
            @endforeach
        </ul>
    </div>
@endif
