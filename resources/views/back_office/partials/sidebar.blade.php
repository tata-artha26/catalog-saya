<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <div class="sidebar-brand">
        <a href="{{ route('back_office.dashboard') }}" class="brand-link">
            <img src="{{ asset('back_office/img/AdminLTELogo.png') }}"
                 alt="Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Toko Saya</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('back_office.dashboard') }}"
                       class="nav-link {{ request()->routeIs('back_office.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Menu di bawah ini dibuat pada Pertemuan 4 --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>Produk</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-receipt"></i>
                        <p>Pesanan</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
