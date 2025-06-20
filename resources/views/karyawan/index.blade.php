@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase text-3xl font-bold text-red-700">List Karyawan</h3>
                            </div>
                            <div class="col-6 text-end">
                                <a class="font-bold border-2 border-red-700 rounded-lg px-3 py-[3px] bg-red-700 text-white hover:bg-red-800 cursor-pointer" href="{{ route('karyawan.create') }}">
                                    <i class="fa fa-plus"></i> &nbsp; Karyawan Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="font-weight-bolder">No</th>
                                        <th class="font-weight-bolder">Nama</th>
                                        <th class="font-weight-bolder">No. Telepon</th>
                                        <th class="font-weight-bolder">Email</th>
                                        <th class="font-weight-bolder">Bergabung Sejak</th>
                                        <th class="font-weight-bolder">#</th>
                                    </tr>
                                </thead>
                                <tbody class="align-items-center">
                                    @foreach ($karyawans as $index => $karyawan)
                                        <tr class="text-center">
                                            <td>{{ ($index+1) }}</td>
                                            <td>{{ $karyawan->full_name }}</td>
                                            <td>{{ $karyawan->phone_no }}</td>
                                            <td>{{ $karyawan->email }}</td>
                                            <td>{{ $karyawan->joined_since }}</td>
                                            <td class="">
                                                <a href="{{ route('karyawan.show', $karyawan->id) }}"><i class="btn btn-success btn-xs text-md fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail Data Karyawan"></i></a>
                                                <a href="{{ route('karyawan.edit', $karyawan->id) }}"><i class="btn btn-primary btn-xs text-md fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah Data Karyawan"></i></a>
                                                <i class="btn btn-danger btn-xs text-md fa fa-trash btn-delete-karyawan" data-full_name="{{ $karyawan->full_name }}" data-phone_no="{{ $karyawan->phone_no }}" data-email="{{ $karyawan->email }}" data-url="{{ route('karyawan.delete', $karyawan->id) }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteConfirmation"></i>
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
                <h4>Apakah anda yakin ingin menghapus data karyawan ini?</h4><br />
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