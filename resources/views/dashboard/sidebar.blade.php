<div class="bg-primary border-white h-max">
    <nav id="navbarBlur" class="hidden"></nav>
    <ul class="navbar-nav bg-primary mt-6">
        <div class="mx-2 mt-4 mb-2 font-weight-bolder text-uppercase text-white hidden sm:inline">Menu</div>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'dashboard.index' ? 'active' : '' }}"
                href="{{ route('dashboard.index') }}">
                <i class="fa fa-dashboard text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item hidden {{ auth()->user()->role_id == 1 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'profile' ? 'active' : '' }}"
                href="{{ route('profile') }}">
                    <i class="fa fa-user text-white text-lg opacity-10"></i>
                <span class="nav-link-text text-white ms-1">Profile</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 1 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'karyawan.attendance' ? 'active' : '' }}"
                href="{{ route('karyawan.attendance') }}">
                <i class="fa fa-calendar text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Daftar Hadir</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 1 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'karyawan.leave' ? 'active' : '' }}"
                href="{{ route('karyawan.leave') }}">
                <i class="fa fa-list text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Manajemen Cuti</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'logout' ? 'active' : '' }}"
                href="{{ route('logout') }}">
                <i class="fa fa-sign-out  text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Logout</span>
            </a>
        </li>
        <div
            class="mx-2 mt-4 mb-2 font-weight-bolder text-uppercase text-white hidden sm:inline {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            Manajemen Karyawan</div>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'karyawan.index' ? 'active' : '' }}"
                href="{{ route('karyawan.index') }}">
                <i class="fa fa-list text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Daftar Karyawan</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'karyawan.create' ? 'active' : '' }}"
                href="{{ route('karyawan.create') }}">
                <i class="fa fa-plus-square text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Tambah Karyawan</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'karyawan.admin_leave' ? 'active' : '' }}"
                href="{{ route('karyawan.admin_leave') }}">
                <i class="fa fa-calendar text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Cuti/Ijin Karyawan</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'karyawan.calendar' ? 'active' : '' }}"
                href="{{ route('karyawan.calendar') }}">
                <i class="fa fa-calendar text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Daftar Hadir Karyawan</span>
            </a>
        </li>
        <div
            class="mx-2 mt-4 mb-2 font-weight-bolder text-uppercase text-white hidden sm:inline {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            Manajemen Bahan / Material</div>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'material.index' ? 'active' : '' }}"
                href="{{ route('material.index') }}">
                <i class="fa fa-list text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Daftar Bahan</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'material.create' ? 'active' : '' }}"
                href="{{ route('material.create') }}">
                <i class="fa fa-plus-square text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Tambah Bahan</span>
            </a>
        </li>
        <div
            class="mx-2 mt-4 mb-2 font-weight-bolder text-uppercase text-white hidden sm:inline {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            Manajemen Menu / Resep</div>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'menu.index' ? 'active' : '' }}"
                href="{{ route('menu.index') }}">
                <i class="fa fa-sticky-note text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Daftar Resep</span>
            </a>
        </li>
        <li class="nav-item hover:bg-red-900 p-2 rounded-xl {{ auth()->user()->role_id == 2 ? 'd-none' : '' }}">
            <a class="nav-link mx-2 flex flex-row items-center justify-center sm:justify-start {{ Route::current()->getName() == 'menu.create' ? 'active' : '' }}"
                href="{{ route('menu.create') }}">
                <i class="fa fa-plus-square text-white text-lg opacity-10"></i>
                <span class="ml-3 nav-link-text text-white hidden sm:inline">Tambah Resep</span>
            </a>
        </li>
    </ul>
</div>
