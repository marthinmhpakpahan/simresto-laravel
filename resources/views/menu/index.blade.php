@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-8">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase">List Menu</h3>
                            </div>
                            <div class="col-6 text-end"><a href="{{ route('menu.create') }}">
                                    <div class="btn btn-primary">Tambah Menu Baru</div>
                                </a></div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Kategori</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Deskripsi</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">#</th>
                                    </tr>
                                </thead>
                                <tbody class="align-items-center">
                                    @foreach ($menus as $index => $menu)
                                        <tr class="text-center">
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">{{ ($index+1) }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">{{ ($menu->menu_category->name) }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">{{ ($menu->name) }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">{{ ($menu->description) }}</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                                <a href="{{ route('menu.show', $menu->id) }}"><i class="btn btn-success btn-xs text-md fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail Data Bahan"></i></a>
                                                <a href="{{ route('menu.edit', $menu->id) }}"><i class="btn btn-primary btn-xs text-md fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah Data Bahan"></i></a>
                                                <i class="btn btn-danger btn-xs text-md fa fa-trash btn-delete-karyawan" data-name="{{ $menu->name }}" data-url="{{ route('menu.delete', $menu->id) }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteConfirmation"></i>
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
                <h4>Apakah anda yakin ingin menghapus data Menu ini?</h4><br />
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