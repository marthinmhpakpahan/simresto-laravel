@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-3">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 border shadow-[6px_6px_6px_#991b1b]">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase font-bold text-red-700 text-3xl">Detail Bahan</h3>
                            </div>
                            <div class="col-6 text-end">
                                <a class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer" href="{{ route('material.edit', $material->id) }}">
                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Bahan
                                </a>
                                <a class="ml-3 font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer" href="{{ route('material.index') }}">
                                    <i class="fa fa-list"></i>&nbsp;&nbsp;Lihat Semua Bahan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-5 pb-4 flex flex-row">
                        <div class="flex w-1/3">
                            <img src="/{{ $material->image }}" class="w-max" alt="...">
                        </div>
                        <div class="flex flex-col ml-10">
                            <div class="col-12 mt-3">
                                <p class="mt-3 font-bold text-red-800">Nama Menu</p>
                                <p class="text-5xl text-black font-bold">{{ $material->name }}</p>
                                <p class="mt-3 font-bold text-red-800">Deskripsi</p>
                                <p class="text-5xl text-black font-bold">{{ $material->description }}</p>
                                <p class="mt-3 font-bold text-red-800">Harga</p>
                                <p class="text-5xl text-black font-bold">Rp. {{ $material->price }}</p>
                                <p class="mt-3 font-bold text-red-800">Ukuran</p>
                                <p class="text-5xl text-black font-bold">{{ $material->weight }} {{ $material->unit }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('dashboard.footer')
