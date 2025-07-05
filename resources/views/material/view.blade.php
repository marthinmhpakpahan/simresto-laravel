@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-3">
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 border shadow-[6px_6px_6px_#991b1b]">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase font-bold text-red-700 text-3xl">Detail Bahan</h3>
                            </div>
                            <div class="col-6 text-end">
                                <a class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"
                                    href="{{ route('material.edit', $material->id) }}">
                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Bahan
                                </a>
                                <a class="ml-3 font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"
                                    href="{{ route('material.index') }}">
                                    <i class="fa fa-list"></i>&nbsp;&nbsp;Lihat Semua Bahan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-5 pb-4 flex flex-row">
                        <div class="flex w-1/4">
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
                                <p class="text-5xl text-black font-bold">{{ $material->weight }} {{ $material->unit }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 border shadow-[6px_6px_6px_#991b1b]">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase font-bold text-red-700 text-xl">Histori Pembelian Bahan
                                </h3>
                            </div>
                            <div class="col-6 text-end">
                                <a class="ml-3 font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer btn-add-purchase"
                                    href="#" data-target="#collapseFormAdd"><i
                                        class="fa fa-list"></i>&nbsp;&nbsp;Tambah Pembelian Baru
                                </a>
                            </div>
                        </div>
                        <div class="collapse col-12 mt-2" id="collapseFormAdd">
                            <div class="card card-body border">
                                <h5 class="text-uppercase text-center font-bold mb-3 text-red-700">Form Bahan</h5>
                                <form role="form" class="row" method="POST" enctype="multipart/form-data"
                                    action={{ route('material_purchase_history.create', $material->id) }}>
                                    @csrf
                                    <input type="hidden" name="material_id" value="{{ $material->id }}"
                                        aria-label="Weight">
                                    <div class="col-3">
                                        <label class="form-label">Invoice</label>
                                        <input type="file" name="invoice" class="form-control" placeholder="..."
                                            aria-label="Weight" aria-describedby="invalidCheckWeight">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Price</label>
                                        <input type="text" name="price" class="form-control" placeholder="..."
                                            aria-label="Weight" aria-describedby="invalidCheckWeight">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Berat</label>
                                        <input type="text" name="weight" class="form-control" placeholder="..."
                                            aria-label="Weight" aria-describedby="invalidCheckWeight">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Satuan</label>
                                        <select class="form-control" name="unit">
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->code }}"
                                                    {{ $unit->code == 'G' ? 'selected' : '' }}>{{ $unit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Nama Toko</label>
                                        <input type="text" name="store_name" class="form-control" placeholder="..."
                                            aria-label="Weight" aria-describedby="invalidCheckWeight">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Keterangan Toko</label>
                                        <input type="text" name="store_details" class="form-control"
                                            placeholder="..." aria-label="Weight"
                                            aria-describedby="invalidCheckWeight">
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">&nbsp;&nbsp;</label>
                                        <button type="submit"
                                            class="form-control border-2 border-red-700 rounded-lg px-4 py-2 bg-red-700 text-white font-bold cursor-pointer hover:bg-red-800">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-5 pb-4 flex flex-row">
                        <table class="">
                            <thead class="text-center">
                                <tr class="text-red-700">
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        No</th>
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        Nama Toko</th>
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        Keterangan Toko</th>
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        Kuantitas</th>
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        Harga</th>
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        Invoice</th>
                                    <th
                                        class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-xs">
                                @foreach ($material_purchase_histories as $index => $history)
                                    <tr>
                                        <td class="border-[1px] border-red-700 px-4 py-2 text-sm">{{$index + 1}}</td>
                                        <td class="border-[1px] border-red-700 px-6 py-1 text-sm">{{ $history->store_name ?: "-" }}</td>
                                        <td class="border-[1px] border-red-700 px-6 py-1 text-sm">{{ $history->store_details ?: "-" }}</td>
                                        <td class="border-[1px] border-red-700 px-4 py-1 text-sm">{{ $history->weight }} {{ $history->unit }}</td>
                                        <td class="border-[1px] border-red-700 px-4 py-1 text-sm">Rp. {{ number_format($history->price) }}</td>
                                        <td class="border-[1px] border-red-700 px-4 py-1 text-sm">
                                            <a class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 btn-detail-image cursor-pointer" data-image="{{ asset($history->invoice) }}" data-bs-toggle="modal" data-bs-target="#modalDetailImage"><i
                                                class="fa fa-image"></i></a>
                                        </td>
                                        <td class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-sm">
                                            <a class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 btn-delete-history cursor-pointer" data-quantity="{{ ($history->weight) }} {{ $history->unit }}" data-store-name="{{ $history->store_name }}" data-price="{{ $history->price }}" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirmation" data-url="{{ route('material_purchase_history.delete', $history->id) }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade modal-lg" id="modalDetailImage" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="modal-detail-image-image img-fluid" src="" alt="" />
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeleteConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menghapus histori pembelian bahan ini?</h4><br />
                <table>
                    <tr>
                        <td>Nama Toko</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-purchase-store-name"></span></td>
                    </tr>
                    <tr>
                        <td>Kuantitas</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-purchase-quantity"></span></td>
                    </tr>
                    <tr>
                        <td>Total Biaya</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-purchase-price"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="modal-btn-confirm-delete" href=""><button type="button"
                        class="btn btn-danger">Yakin!</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("View Material Page!");

        $(".btn-detail-image").on("click", function() {
            var data_image = $(this).data("image");
            $(".modal-detail-image-image").attr("src", data_image);
        });

        $(".btn-add-purchase").on("click", function(event) {
            console.log("btn-add-purchase clicked!")
            event.preventDefault()
            var data_target = $(this).data("target");
            console.log("btn-add-purchase", data_target)
            $(data_target).removeClass("collapse");
            $(data_target).addClass("show");
        });

        $(".btn-delete-history").on("click", function() {
            var data_store_name = $(this).data("store-name");
            $(".modal-purchase-store-name").text(data_store_name);
            var data_quantity = $(this).data("quantity");
            $(".modal-purchase-quantity").text(data_quantity);
            var data_price = $(this).data("price");
            $(".modal-purchase-price").text(data_price);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-delete").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')
