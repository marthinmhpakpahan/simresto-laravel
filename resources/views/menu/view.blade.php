@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-3">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase">Detail Menu</h3>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('menu.index') }}">
                                    <div class="btn btn-primary">Lihat Semua Menu</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-5 pb-4">
                        <div class="row flex-nowrap overflow-auto">
                            @foreach ($menu_images as $index => $menu_image)
                                <div class="col-3 border rounded {{ $index == 0 ? "active" : "" }}">
                                    <img src="/{{ $menu_image->path }}" class="d-block" alt="..." height="180">
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th>Nama Menu</th>
                                            <th>:</th>
                                            <th>{{ $menu->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>:</th>
                                            <th>{{ $menu->menu_category->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>:</th>
                                            <th>{{ $menu->description }}</th>
                                        </tr>
                                        <tr>
                                            <th>Total Biaya</th>
                                            <th>:</th>
                                            <th>Rp. {{ number_format($total_cost) }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="text-uppercase">List Bahan (Resep)</h5>
                            </div>
                            <div class="col-6 text-end">
                                <div class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#collapseFormAdd" aria-expanded="false" aria-controls="collapseFormAdd"><i class="fa fa-plus-square text-white text-md"></i>  Tambah Bahan Resep</div>
                            </div>
                            <div class="collapse col-12 mt-2" id="collapseFormAdd">
                                <div class="card card-body border">
                                    <h5 class="text-uppercase">Form Bahan</h5>
                                    <form role="form" class="row" method="POST" action={{ route('menurecipe.create', $menu->id) }}>
                                        @csrf
                                        <div class="col-3">
                                            <label class="form-label">Bahan</label>
                                            <select class="form-control" name="bahan">
                                                @foreach ($materials as $material)
                                                    <option value="{{ $material->id }}" data-weight="{{ $material->weight }}" data-price="{{ $material->price }}" data-unit="{{ $material->unit }}">{{ $material->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Berat</label>
                                            <input type="text" name="weight"
                                                class="form-control"
                                                placeholder="..." aria-label="Weight"
                                                aria-describedby="invalidCheckWeight">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Satuan</label>
                                            <select class="form-control" name="unit">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->code }}" {{ $unit->code == "G" ? "selected" : "" }}>{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">&nbsp;&nbsp;</label>
                                            <button type="submit" class="form-control btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="font-weight-bolder text-uppercase text-sm">No</th>
                                            <th class="font-weight-bolder text-uppercase text-sm">Nama</th>
                                            <th class="font-weight-bolder text-uppercase text-sm">Berat</th>
                                            <th class="font-weight-bolder text-uppercase text-sm">Total Biaya</th>
                                            <th class="font-weight-bolder text-uppercase text-sm">#</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-xs">
                                        @foreach ($menu_recipes as $index => $menu_recipe)
                                            <tr>
                                                <th colspan="5">
                                                    <div class="collapse col-12" id="collapseFormAdd-{{ $menu_recipe->id }}">
                                                        <div class="card card-body">
                                                            <h5 class="text-uppercase py-2 font-weight-bolder">Edit Bahan {{ $menu_recipe->id }}</h5>
                                                            <form role="form" class="row" method="POST" action={{ route('menurecipe.edit', $menu->id) }}>
                                                                @csrf
                                                                <input type="hidden" name="menu_recipe_id" value="{{ $menu_recipe->id }}">
                                                                <input type="hidden" name="menu_id" value="{{ $menu_recipe->menu_id }}">
                                                                <div class="col-3">
                                                                    <label class="form-label">Bahan</label>
                                                                    <select class="form-control" name="bahan">
                                                                        @foreach ($materials as $material)
                                                                            <option value="{{ $material->id }}" data-weight="{{ $material->weight }}" data-price="{{ $material->price }}" data-unit="{{ $material->unit }}" {{ $menu_recipe->material_id == $material->id ? "selected" : "" }}>{{ $material->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label class="form-label">Berat</label>
                                                                    <input type="text" name="weight"
                                                                        class="form-control" value="{{ $menu_recipe->weight }}"
                                                                        placeholder="..." aria-label="Weight"
                                                                        aria-describedby="invalidCheckWeight">
                                                                </div>
                                                                <div class="col-3">
                                                                    <label class="form-label">Satuan</label>
                                                                    <select class="form-control" name="unit">
                                                                        @foreach ($units as $unit)
                                                                            <option value="{{ $unit->code }}" {{ $unit->code == $menu_recipe->unit ? "selected" : "" }}>{{ $unit->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label class="form-label">&nbsp;&nbsp;</label><br/>
                                                                    <button type="submit" class="form-control btn btn-success">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="font-weight-bolder text-uppercase text-sm">{{ ($index + 1) }}</th>
                                                <th class="font-weight-bolder text-uppercase text-sm">{{ $menu_recipe->material->name }}</th>
                                                <th class="font-weight-bolder text-uppercase text-sm">{{ $menu_recipe->weight }} {{ $menu_recipe->unit }}</th>
                                                <th class="font-weight-bolder text-sm">Rp. {{ number_format($menu_recipe->total_cost) }}</th>
                                                <th class="font-weight-bolder text-uppercase text-sm">
                                                    <i class="btn btn-primary btn-xs text-md fa fa-edit btn-edit-recipe" data-bs-toggle="collapse" data-bs-target="#collapseFormAdd-{{ $menu_recipe->id }}" aria-expanded="false" aria-controls="collapseFormAdd-{{ $menu_recipe->id }}" data-menu-id="{{ $menu_recipe->menu_id }}" data-material-id="{{ $menu_recipe->material_id }}" data-weight={{ $menu_recipe->weight }} data-unit="{{ $menu_recipe->unit }}"></i>
                                                    <i class="btn btn-danger btn-xs text-md fa fa-trash btn-delete-recipe" data-name="{{ $menu->name }}" data-url="{{ route('menu.delete', $menu->id) }}" data-bs-toggle="modal"
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
        console.log("View Menu Page!");
        $(".btn-edit-recipe").on("click", function(event) {
            event.preventDefault();
            var data_menu_id = $(this).data("menu-id");
            var data_material_id = $(this).data("material-id");
            var data_weight = $(this).data("weight");
            var data_unit = $(this).data("unit");
            console.log(data_menu_id, data_material_id, data_weight, data_unit);
        });
    });
</script>
@include('dashboard.footer')
