@include('dashboard.header')
<div class="flex flex-row bg-white mx-4 p-5 rounded-lg">
    <div class="border-2 border-red-700 py-3 px-4 mx-3 rounded-lg w-1/4">
        <div class="flex flex-row">
            <div class="mr-[5px] w-2/3">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Karyawan</p>
                    <h5 class="font-weight-bolder">
                        30 Orang
                    </h5>
                    <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+15%</span>
                        sejak tahun lalu
                    </p>
                </div>
            </div>
            <div class="text-end flex items-center justify-center ml-3 w-1/3">
                <div class="icon icon-shape bg-red-700 shadow-primary text-center rounded-circle">
                    <i class="fa fa-users text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="border-2 border-green-700 py-3 px-4 mx-3 rounded-lg w-1/4">
        <div class="flex flex-row">
            <div class="mr-[5px] w-2/3">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Bahan</p>
                    <h5 class="font-weight-bolder">
                        30 Orang
                    </h5>
                    <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+15%</span>
                        sejak tahun lalu
                    </p>
                </div>
            </div>
            <div class="text-end flex items-center justify-center ml-3 w-1/3">
                <div class="icon icon-shape bg-green-700 shadow-primary text-center rounded-circle">
                    <i class="fa fa-layer-group text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="border-2 border-yellow-700 py-3 px-4 mx-3 rounded-lg w-1/4">
        <div class="flex flex-row">
            <div class="mr-[5px] w-2/3">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Menu</p>
                    <h5 class="font-weight-bolder">
                        30 Orang
                    </h5>
                    <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+15%</span>
                        sejak tahun lalu
                    </p>
                </div>
            </div>
            <div class="text-end flex items-center justify-center ml-3 w-1/3">
                <div
                    class="icon icon-shape bg-yellow-700 shadow-primary justify-center items-center text-center rounded-circle">
                    <i class="fa fa-list text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="border-2 border-blue-700 py-3 px-4 mx-3 rounded-lg w-1/4">
        <div class="flex flex-row">
            <div class="mr-[5px] w-2/3">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User Aktif</p>
                    <h5 class="font-weight-bolder">
                        30 Orang
                    </h5>
                    <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder">+15%</span>
                        sejak tahun lalu
                    </p>
                </div>
            </div>
            <div class="text-end flex items-center justify-center ml-3 w-1/3">
                <div class="icon icon-shape bg-blue-700 shadow-primary text-center rounded-circle">
                    <i class="fa fa-user text-md opacity-10" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col flex-wrap bg-white mx-4 py-5 px-5 rounded-lg mt-4">
    <div class="w-max border-[2px] rounded-xl border-red-700 m-2 p-3">
        <span class="font-bold text-xl border-b-2 border-red-700 text-red-700">Daftar Karyawan</span>
        <table class="mt-2">
            <tr>
                <td class="border-2 border-black px-3 py-1 font-bold">No</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Nama</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Email</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Status</td>
                <td class="border-2 border-black px-3 py-1 font-bold">#</td>
            </tr>
            @foreach ($karyawans as $index => $karyawan)
                <tr>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold text-center">{{ $index + 1 }}
                    </td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $karyawan->full_name }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $karyawan->email }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold text-center">
                        {{ $karyawan->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">
                      <a class="btn btn-sm btn-primary" href="/karyawan/show/{{ $karyawan->id }}" target="_blank">
                        <i class="fa fa-eye"></i>&nbsp;&nbsp;Lihat Detail
                      </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="w-max border-[2px] rounded-xl border-green-700 m-2 p-3">
        <span class="font-bold text-xl border-b-2 border-green-700 text-green-700">Daftar Bahan</span>
        <table class="mt-2">
            <tr>
                <td class="border-2 border-black px-3 py-1 font-bold">No</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Nama</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Deskripsi</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Berat</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Gambar</td>
                <td class="border-2 border-black px-3 py-1 font-bold">#</td>
            </tr>
            @foreach ($materials as $index => $material)
                <tr>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold text-center">{{ $index + 1 }}
                    </td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $material->name }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold text-center">
                        {{ $material->description ?: '-' }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold text-center">
                        {{ $material->weight }} {{ $material->unit }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">
                        <a class="btn btn-sm btn-success" href="{{ asset($material->image) }}" target="_blank"><i
                                class="fa fa-eye"></i>&nbsp;&nbsp;Lihat Gambar</a>
                    </td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold text-center">
                      <a class="btn btn-sm btn-primary" href="/bahan/edit/{{ $material->id }}" target="_blank">
                        <i class="fa fa-eye"></i>&nbsp;&nbsp;Lihat Detail
                      </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="w-max border-[2px] rounded-xl border-yellow-700 m-2 p-3">
        <span class="font-bold text-xl border-b-2 border-yellow-700 text-yellow-700">Daftar Menu</span>
        <table class="mt-2">
            <tr>
                <td class="border-2 border-black px-3 py-1 font-bold">No</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Nama</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Deskripsi</td>
                <td class="border-2 border-black px-3 py-1 font-bold">#</td>
            </tr>
            @foreach ($menus as $index => $menu)
                <tr>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $index + 1 }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $menu->name }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $menu->description }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">
                      <a class="btn btn-sm btn-primary" href="" target="_blank">
                        <i class="fa fa-eye"></i>&nbsp;&nbsp;Lihat Detail
                      </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="w-max border-[2px] rounded-xl border-blue-700 m-2 p-3">
        <span class="font-bold text-xl border-b-2 border-blue-700 text-blue-700">Daftar Cuti</span>
        <table class="mt-2">
            <tr>
                <td class="border-2 border-black px-3 py-1 font-bold">No</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Nama</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Email</td>
                <td class="border-2 border-black px-3 py-1 font-bold">Status</td>
            </tr>
            @foreach ($karyawans as $index => $karyawan)
                <tr>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $index + 1 }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $karyawan->full_name }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">{{ $karyawan->email }}</td>
                    <td class="border-[1px] border-black px-3 py-1 font-semibold">
                        {{ $karyawan->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@include('dashboard.footer')
