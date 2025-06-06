@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-8">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase">List Bahan</h3>
                            </div>
                            <div class="col-6 text-end"><a href="{{ route('material.create') }}">
                                    <div class="btn btn-success">Tambah Bahan Baru</div>
                                </a></div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Gambar</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Berat</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Harga</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">#</th>
                                    </tr>
                                </thead>
                                <tbody class="align-items-center">
                                    @foreach ($materials as $index => $material)
                                        <tr class="text-center">
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                {{ $index + 1 }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder w-24">
                                                <img src="{{ $material->image }}" height="80" alt="" />
                                            </th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                {{ $material->name }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                {{ $material->weight }} {{ $material->unit }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">Rp.
                                                {{ $material->price }}</th>
                                            <th class="text-uppercase text-secondary">
                                                <a href="{{ route('material.show', $material->id) }}"
                                                    class="btn btn-success btn-xs text-md px-4 py-2" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Ubah Data Bahan">
                                                    <i class="fa fa-search"></i>&nbsp;&nbsp;Detail
                                                </a>
                                                <a href="{{ route('material.edit', $material->id) }}"
                                                    class="btn btn-primary btn-xs text-md px-4 py-2" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Ubah Data Bahan">
                                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;Edit
                                                </a>
                                                <a class="btn btn-danger btn-xs text-md btn-delete-karyawan px-4 py-2"
                                                data-name="{{ $material->name }}"
                                                data-url="{{ route('karyawan.delete', $material->id) }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteConfirmation">
                                                    <i class="fa fa-trash"></i>&nbsp;&nbsp;Delete
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
