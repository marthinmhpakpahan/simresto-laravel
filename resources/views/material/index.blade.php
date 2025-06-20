@include('dashboard.header')
<main class="relative rounded-lg h-screen">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class=""><span
                                        class="text-uppercase text-3xl font-bold text-red-700">List
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
                            <table class="">
                                <tr class="text-center">
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 w-[50px] py-[12px]">No</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 w-[150px]">Gambar</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 w-[400px]">Nama</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 w-[150px]">Berat</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 w-[150px]">Harga</td>
                                    <td class="text-uppercase text-sm font-weight-bolder border-[2px] border-red-700 w-[350px]">#</td>
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
                                                <i class="fa fa-search"></i>&nbsp;&nbsp;Detail
                                            </a>
                                            <a href="{{ route('material.edit', $material->id) }}"
                                                class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 cursor-pointer">
                                                <i class="fa fa-edit"></i>&nbsp;&nbsp;Edit
                                            </a>
                                            <a class="rounded-xl border border-red-800 px-3 py-[1px] bg-red-700 text-white hover:bg-red-800 cursor-pointer"
                                                data-name="{{ $material->name }}"
                                                data-url="{{ route('karyawan.delete', $material->id) }}"
                                                data-bs-toggle="modal" data-bs-target="#modalDeleteConfirmation">
                                                <i class="fa fa-trash"></i>&nbsp;&nbsp;Delete
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
                        <td><span class="modal-karyawan-full_name"></span></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-phone_no"></span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-email"></span></td>
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

        $(".btn-delete-karyawan").on("click", function() {
            var data_fullname = $(this).data("full_name");
            $(".modal-karyawan-full_name").text(data_fullname);
            var data_phone_no = $(this).data("phone_no");
            $(".modal-karyawan-phone_no").text(data_phone_no);
            var data_email = $(this).data("email");
            $(".modal-karyawan-email").text(data_email);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-delete").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')
