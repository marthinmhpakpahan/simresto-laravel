@include('dashboard.header')
<div class="flex flex-row bg-white mx-4 p-5 rounded-lg justify-center">
    <div class="border-2 border-red-700 py-3 px-4 mx-3 rounded-lg tracking-wider">
        <div class="flex flex-col text-center">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Karyawan</p>
                <div class="text-end flex items-center justify-center my-2">
                    <div class="icon icon-shape bg-red-700 shadow-primary text-center rounded-circle">
                        <i class="fa fa-users text-md opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                <h5 class="font-weight-bolder text-xl">
                    {{ $total_karyawan }} Orang
                </h5>
        </div>
    </div>
    <div class="border-2 border-green-700 py-3 px-4 mx-3 rounded-lg tracking-wider">
        <div class="flex flex-col text-center">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Bahan</p>
            <div class="text-end flex items-center justify-center my-2">
                <div class="icon icon-shape bg-green-700 shadow-primary text-center rounded-circle">
                    <i class="fa fa-layer-group text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            <h5 class="font-weight-bolder text-xl">
                {{ $total_material }} Bahan
            </h5>
        </div>
    </div>
    <div class="border-2 border-yellow-700 py-3 px-4 mx-3 rounded-lg tracking-wider">
        <div class="flex flex-col text-center">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Menu</p>
            <div class="text-end flex items-center justify-center my-2">
                <div
                    class="icon icon-shape bg-yellow-700 shadow-primary justify-center items-center text-center rounded-circle">
                    <i class="fa fa-list text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            <h5 class="font-weight-bolder text-xl">
                {{ $total_menu }} Menu
            </h5>
        </div>
    </div>
    <div class="border-2 border-blue-700 py-3 px-4 mx-3 rounded-lg tracking-wider">
        <div class="flex flex-col text-center">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User Aktif</p>
            <div class="text-end flex items-center justify-center my-2">
                <div class="icon icon-shape bg-blue-700 shadow-primary text-center rounded-circle">
                    <i class="fa fa-user text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            <h5 class="font-weight-bolder text-xl">
                {{ $total_active_karyawan }} Orang
            </h5>
        </div>
    </div>
</div>

<div class="mt-4 px-4 w-full">
    <div class="flex flex-col bg-white shadow-lg rounded-lg p-4">
        <span class="font-bold text-2xl text-red-600 my-2">Daftar Karyawan</span>
        <table class="w-full bg-white rounded-lg">
            <thead>
                <tr class="text-center bg-slate-200 text-slate-500">
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">
                        No</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">
                        Nama</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">
                        Email</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">
                        No Telepon</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">
                        Status</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">
                        Action</td>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($karyawans as $index => $karyawan)
                    <tr class="text-slate-500 border-t border-slate-400 bg-white text-center">
                        <td class="px-1 sm:px-4 py-[10px] text-center">{{ $index + 1 }}
                        </td>
                        <td class="px-1 sm:px-4 py-[10px]">{{ $karyawan->full_name }}</td>
                        <td class="px-1 sm:px-4 py-[10px]">{{ $karyawan->email }}</td>
                        <td class="px-1 sm:px-4 py-[10px]">{{ $karyawan->phone_no }}</td>
                        <td class="px-1 sm:px-4 py-[10px] text-center">
                            {{ $karyawan->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td class="px-1 sm:px-4 py-[10px] text-center">
                            <a class="rounded-xl border border-red-700 px-3 py-[1px] text-red-700 hover:bg-red-800 hover:text-white"
                                href="/karyawan/show/{{ $karyawan->id }}">
                                <i class="fa fa-search"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3 px-4 w-full">
    <div class="flex flex-col bg-white shadow-lg rounded-lg p-4">
        <span class="font-bold text-2xl text-green-600 my-2">Daftar Bahan</span>
        <table class="w-full bg-white rounded-lg">
            <thead>
                <tr class="text-center bg-slate-200 text-slate-500">
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">No</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Nama</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Deskripsi
                    </td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Berat</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Gambar</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $index => $material)
                    <tr class="text-slate-500 border-t border-slate-400 bg-white text-center">
                        <td class="px-1 sm:px-4 py-[10px] text-center">{{ $index + 1 }}
                        </td>
                        <td class="px-1 sm:px-4 py-[10px]">{{ $material->name }}</td>
                        <td class="px-1 sm:px-4 py-[10px] text-wrap">
                            {{ $material->description ? substr($material->description, 0, 100) : '-' }}</td>
                        <td class="px-1 sm:px-4 py-[10px] text-center">
                            {{ $material->weight }} {{ $material->unit }}</td>
                        <td class="px-1 sm:px-4 py-[10px] text-center">
                            <a class="rounded-xl border border-red-700 px-3 py-[1px] text-red-700 hover:bg-red-800 hover:text-white"
                                href="{{ asset($material->image) }}"><i class="fa fa-image"></i></a>
                        </td>
                        <td class="px-1 sm:px-4 py-[10px] text-center">
                            <a class="rounded-xl border border-red-700 px-3 py-[1px] text-red-700 hover:bg-red-800 hover:text-white"
                                href="/bahan/edit/{{ $material->id }}">
                                <i class="fa fa-search"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3 px-4 w-full">
    <div class="flex flex-col bg-white shadow-lg rounded-lg p-4">
        <span class="font-bold text-2xl text-yellow-600 my-2">Daftar Menu</span>
        <table class="w-full bg-white rounded-lg">
            <thead>
                <tr class="text-center bg-slate-200 text-slate-500">
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">No</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Nama</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Deskripsi</td>
                    <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $index => $menu)
                    <tr class="text-slate-500 border-t border-slate-400 bg-white text-center">
                        <td class="px-1 sm:px-4 py-[10px] text-center">{{ $index + 1 }}
                        </td>
                        <td class="px-1 sm:px-4 py-[10px]">{{ $menu->name }}</td>
                        <td class="px-1 sm:px-4 py-[10px]">{{ substr($menu->description, 0, 100) }}{{ strlen($menu->description) < 100 ? "" : "..." }}</td>
                        <td class="px-1 sm:px-4 py-[10px]">
                            <a class="rounded-xl border border-red-700 px-3 py-[1px] text-red-700 hover:bg-red-800 hover:text-white"
                                href="{{ route('menu.show', $menu->id) }}">
                                <i class="fa fa-search"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3 px-4 w-full">
    <div class="flex flex-col bg-white shadow-lg rounded-lg p-4">
        <span class="font-bold text-2xl text-blue-600">Daftar Cuti</span>
        <table class="table-auto">
            <tr class="text-center bg-slate-200 text-slate-500">
                <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">No</td>
                <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Nama</td>
                <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Email</td>
                <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">No Telepon</td>
                <td class="py-3 px-1 sm:px-4 text-black text-xs font-semibold uppercase tracking-wider">Status</td>
            </tr>
            @foreach ($karyawans as $index => $karyawan)
                <tr class="text-slate-500 border-t border-slate-400 bg-white text-center">
                    <td class="px-1 sm:px-4 py-[10px]">{{ $index + 1 }}</td>
                    <td class="px-1 sm:px-4 py-[10px]">{{ $karyawan->full_name }}</td>
                    <td class="px-1 sm:px-4 py-[10px]">{{ $karyawan->email }}</td>
                    <td class="px-1 sm:px-4 py-[10px]">{{ $karyawan->phone_no }}</td>
                    <td class="px-1 sm:px-4 py-[10px] text-center">
                        {{ $karyawan->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@include('dashboard.footer')
