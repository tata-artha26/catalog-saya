<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    Lihat Website
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">

                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-footer">

                        {{-- Logout wajib memakai form POST, bukan tautan biasa --}}
                        <form action="{{ route('back_office.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-default btn-flat float-end">
                                Logout
                            </button>
                        </form>

                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
