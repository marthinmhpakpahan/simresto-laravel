<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "dashboard" ? "active" : "" }}" href="{{ route('dashboard.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-dashboard text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.index" ? "active" : "" }}" href="{{ route('karyawan.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-calendar text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "material.index" ? "active" : "" }}" href="{{ route('material.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-list text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Bahan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "menu.index" ? "active" : "" }}" href="{{ route('menu.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-sticky-note text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Resep</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "profile" ? "active" : "" }}" href="{{ route('profile') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "logout" ? "active" : "" }}" href="{{ route('logout') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-sign-out text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
        </li>
    </ul>
</div>
