<div class="bg-primary border-white h-max">
    <ul class="navbar-nav bg-primary mt-6">
        <div class="mx-4 my-2 font-weight-bolder text-uppercase text-white">Menu</div>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "dashboard.index" ? "active" : "" }}" href="{{ route('dashboard.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-dashboard text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item hidden {{ auth()->user()->role_id == 1 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "profile" ? "active" : "" }}" href="{{ route('profile') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-user text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Profile</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 1 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.attendance" ? "active" : "" }}" href="{{ route('karyawan.attendance') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-calendar text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Daftar Hadir</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 1 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.leave" ? "active" : "" }}" href="{{ route('karyawan.leave') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-list text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Manajemen Cuti</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == "logout" ? "active" : "" }}" href="{{ route('logout') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-sign-out  text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Logout</span>
            </a>
        </li>
        <div class="mx-4 my-2 mt-4 font-weight-bolder text-uppercase text-white {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">Manajemen Karyawan</div>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.index" ? "active" : "" }}" href="{{ route('karyawan.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-list text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">List Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.create" ? "active" : "" }}" href="{{ route('karyawan.create') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-plus-square text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Tambah Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.admin_leave" ? "active" : "" }}" href="{{ route('karyawan.admin_leave') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-calendar text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Cuti/Ijin Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "karyawan.calendar" ? "active" : "" }}" href="{{ route('karyawan.calendar') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-calendar text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Daftar Hadir Karyawan</span>
            </a>
        </li>
        <div class="mx-4 my-2 mt-4 font-weight-bolder text-white text-uppercase {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">Manajemen Bahan / Material</div>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "material.index" ? "active" : "" }}" href="{{ route('material.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-list text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Manage Bahan</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "material.create" ? "active" : "" }}" href="{{ route('material.create') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-plus-square text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Tambah Bahan</span>
            </a>
        </li>
        <div class="mx-4 my-2 mt-4 font-weight-bolder text-white text-uppercase {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">Manajemen Menu / Resep</div>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "menu.index" ? "active" : "" }}" href="{{ route('menu.index') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-sticky-note text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Manage Resep</span>
            </a>
        </li>
        <li class="nav-item {{ auth()->user()->role_id == 2 ? "d-none" : "" }}">
            <a class="nav-link {{ Route::current()->getName() == "menu.create" ? "active" : "" }}" href="{{ route('menu.create') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa fa-plus-square text-white text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text text-white ms-1">Tambah Resep</span>
            </a>
        </li>
    </ul>
</div>
