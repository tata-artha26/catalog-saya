<!doctype html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('judul', 'Back Office') — Toko Saya</title>

  @vite('resources/css/app.css')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    @include('back_office.partials.navbar')
    @include('back_office.partials.sidebar')

    <main class="app-main">

        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="mb-0">@yield('judul-halaman')</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                @yield('konten')
            </div>
        </div>

    </main>

    @include('back_office.partials.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('admin/js/adminlte.js') }}"></script>

</body>
</html>
