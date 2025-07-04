@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <span class="text-uppercase text-3xl font-bold text-red-700"><i class="fa fa-list"></i>&nbsp;List Menu</span>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('menu.create') }}"
                                    class="font-bold border-2 border-red-700 rounded-lg px-3 py-[3px] bg-red-700 text-white hover:bg-red-800 cursor-pointer">
                                    <i class="fa fa-plus"></i>&nbsp;Tambah Menu Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-center">
                                        <th
                                            class="text-uppercase text-md font-weight-bolder border-[1px] border-red-700 px-3 py-2 text-red-700">
                                            No</th>
                                        <th
                                            class="text-uppercase text-md font-weight-bolder tracking-wider border-[1px] border-red-700 text-red-700">
                                            Kategori</th>
                                        <th
                                            class="text-uppercase text-md font-weight-bolder tracking-wider border-[1px] border-red-700 text-red-700">
                                            Nama</th>
                                        <th
                                            class="text-center text-uppercase text-md font-weight-bolder tracking-wider border-[1px] border-red-700 text-red-700">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-md font-weight-bolder tracking-wider border-[1px] border-red-700 text-red-700">
                                            #</th>
                                    </tr>
                                </thead>
                                <tbody class="align-items-center">
                                    @foreach ($menus as $index => $menu)
                                        <tr class="text-center">
                                            <td
                                                class="border-[1px] border-red-700 px-3 py-2">
                                                {{ $index + 1 }}</td>
                                            <td
                                                class="border-[1px] border-red-700 px-3 py-2">
                                                {{ $menu->menu_category->name }}</td>
                                            <td
                                                class="border-[1px] border-red-700 px-3 py-2">
                                                {{ $menu->name }}</td>
                                            <td
                                                class="text-wrap text-start border-[1px] border-red-700 px-3 py-2">
                                                {{ $menu->description }}</td>
                                            <td class="border-[1px] border-red-700 px-3 py-2">
                                                <div class="flex flex-row justify-center">
                                                    <a href="{{ route('menu.show', $menu->id) }}" data-bs-toggle="tooltip"
                                                        class="border text-white bg-red-700 hover:bg-red-800 px-2 py-1 rounded-lg text-md mx-[1px]"
                                                        data-bs-placement="top" data-bs-title="Detail Data Bahan">
                                                        <i class="text-md fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('menu.edit', $menu->id) }}" data-bs-toggle="tooltip"
                                                        class="border text-white bg-red-700 hover:bg-red-800 px-2 py-1 rounded-lg text-md mx-[1px]"
                                                        data-bs-placement="top" data-bs-title="Ubah Data Bahan">
                                                        <i class="text-md fa fa-edit"></i>
                                                    </a>
                                                    <a class="border text-white bg-red-700 hover:bg-red-800 px-2 py-1 rounded-lg text-md btn-delete-menu mx-[1px]"
                                                        data-name="{{ $menu->name }}"
                                                        data-category="{{ $menu->menu_category->name }}"
                                                        data-description="{{ $menu->description }}"
                                                        data-url="{{ route('menu.delete', $menu->id) }}"
                                                        data-bs-toggle="modal" data-bs-target="#modalDeleteConfirmation">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
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
                <h4>Apakah anda yakin ingin menghapus data Menu ini?</h4><br />
                <table>
                    <tr>
                        <td>Kategori</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-menu-category"></span></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-menu-name"></span></td>
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
        console.log("Index Menu Page!");
        $(".btn-delete-menu").on("click", function() {
            var data_category = $(this).data("category");
            $(".modal-menu-category").text(data_category);
            var data_name = $(this).data("name");
            $(".modal-menu-name").text(data_name);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-delete").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')
