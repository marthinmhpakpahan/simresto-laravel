@include('dashboard.header')
<main class="relative rounded-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class=""><span
                                        class="text-uppercase text-3xl font-bold text-red-700"><i class="fa fa-list"></i>&nbsp;List
                                        Bahan</span></h3>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('material.create') }}"
                                    class="font-bold border-2 border-red-700 rounded-lg px-3 py-[3px] bg-red-700 text-white hover:bg-red-800 cursor-pointer">
                                    <i class="fa fa-plus"></i>&nbsp;Tambah Bahan Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="w-full">
                                <tr class="text-center">
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 tracking-wider py-[12px]">No</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 tracking-wider">Gambar</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 tracking-wider">Nama</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 tracking-wider">Berat</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 tracking-wider">Harga</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 tracking-wider">Action</td>
                                </tr>
                                @foreach ($materials as $index => $material)
                                    <tr class="text-center">
                                        <td
                                            class="text-uppercase text-sm border-[1px] border-red-700 py-3">
                                            {{ $index + 1 }}</td>
                                        <td class="text-uppercase text-sm border-[1px] border-red-700">
                                            <a class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 btn-detail-image cursor-pointer" data-image="{{ asset($material->image) }}" data-bs-toggle="modal" data-bs-target="#modalDetailImage"><i
                                                class="fa fa-image"></i></a>
                                        </td>
                                        <td class="text-uppercase text-sm border-[1px] border-red-700">
                                            {{ $material->name }}</td>
                                        <td class="text-uppercase text-sm border-[1px] border-red-700">
                                            {{ $material->weight }} {{ $material->unit }}</td>
                                        <td class="text-sm border-[1px] border-red-700">
                                            Rp. {{ $material->price }}</td>
                                        <td class="border-[1px] border-red-700">
                                            <a href="{{ route('material.show', $material->id) }}"
                                                class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 cursor-pointer">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a href="{{ route('material.edit', $material->id) }}"
                                                class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 cursor-pointer">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 cursor-pointer btn-confirm-delete"
                                                data-name="{{ $material->name }}" data-size="{{ $material->weight }} {{ $material->unit }}"
                                                data-price="{{ $material->price }}" data-url="{{ route('material.delete', $material->id) }}"
                                                data-bs-toggle="modal" data-bs-target="#modalDeleteConfirmation">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
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
                <h4>Apakah anda yakin ingin menghapus data bahan ini?</h4><br />
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-name"></span></td>
                    </tr>
                    <tr>
                        <td>Ukuran</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-size"></span></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-price"></span></td>
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
        console.log("Index Karyawan Page!");
        $(".btn-detail-image").on("click", function() {
            var data_image = $(this).data("image");
            $(".modal-detail-image-image").attr("src", data_image);
        });

        $(".btn-confirm-delete").on("click", function() {
            var data_name = $(this).data("name");
            $(".modal-name").text(data_name);
            var data_size = $(this).data("size");
            $(".modal-size").text(data_size);
            var data_price = $(this).data("price");
            $(".modal-price").text(data_price);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-delete").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')
