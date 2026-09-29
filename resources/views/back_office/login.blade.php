<!doctype html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin — Toko Saya</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">
</head>
<body class="login-page bg-body-secondary">

<main class="login-box">

    <h1 class="login-logo">
        <a href="{{ route('home') }}"><b>Toko</b> Saya</a>
    </h1>

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Masuk ke Back Office</p>

            {{-- Menampilkan pesan kesalahan --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $pesan)
                            <li>{{ $pesan }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('back_office.login.proses') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="admin@tokosaya.test"
                           required
                           autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>

            </form>

        </div>
    </div>
</main>

<script src="{{ asset('admin/js/adminlte.js') }}"></script>

</body>
</html>
