@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-3">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6 flex flex-row items-center">
                                <span
                                    class="text-uppercase text-3xl font-bold border-b-[4px] border-red-700 text-red-700">Detail
                                    Menu</span>
                                <a href="{{ route('menu.edit', $menu->id) }}"
                                    class="ml-4 border-2 px-3 text-red-700 border-red-700 py-[1px] rounded-lg hover:bg-red-700 hover:text-white cursor-pointer">
                                    <i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </div>
                            <div class="col-6 text-end">
                                <a class="border-2 border-red-700 rounded-lg px-4 py-2 bg-red-700 text-white font-bold cursor-pointer hover:bg-red-800"
                                    href="{{ route('menu.index') }}">
                                    <i class="fa fa-list"></i>&nbsp;
                                    Lihat Semua Menu</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-5 pb-4">
                        <div class="row flex flex-row items-center">
                            @foreach ($menu_images as $index => $menu_image)
                                <div class="w-1/4 relative flex justify-end">
                                    <img src="/{{ $menu_image->path }}"
                                        class="rounded-lg border-3 object-cover block border-red-700 mt-3"
                                        alt="..." height="180" />
                                    <a href="{{ route('menu_image.delete', [$menu->id, $menu_image->id]) }}">
                                        <i class="absolute text-lg bg-red-800 rounded-3xl text-white text-md fa fa-trash btn-delete-karyawan bottom-0 right-0 mr-5 mb-2 py-2 px-3 hover:bg-red-600 cursor-pointer"
                                            data-name="{{ $menu->name }}"
                                            data-url="{{ route('menu.delete', $menu->id) }}" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirmation"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="w-48">Nama Menu</th>
                                            <th>:</th>
                                            <th>{{ $menu->name }}</th>
                                        </tr>
                                        <tr>
                                            <th class="w-48">Kategori</th>
                                            <th>:</th>
                                            <th>{{ $menu->menu_category->name }}</th>
                                        </tr>
                                        <tr>
                                            <th class="w-48">Deskripsi</th>
                                            <th>:</th>
                                            <th>{{ $menu->description }}</th>
                                        </tr>
                                        <tr>
                                            <th class="w-48">Total Biaya</th>
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
                                <span
                                    class="text-uppercase text-2xl font-bold border-b-[4px] border-red-700 text-red-700">Daftar
                                    Bahan</span>
                            </div>
                            <div class="col-6 text-end">
                                <a class="border-2 border-red-700 rounded-lg px-4 py-2 bg-red-700 text-white font-bold cursor-pointer hover:bg-red-800 btn-add-material"
                                    data-target="#collapseFormAdd">
                                    <i class="fa fa-plus-square text-white text-md"></i>&nbsp;Tambah Bahan Resep
                                </a>
                            </div>
                            <div class="collapse col-12 mt-2" id="collapseFormAdd">
                                <div class="card card-body border">
                                    <h5 class="text-uppercase text-center font-bold mb-3 text-red-700">Form Bahan</h5>
                                    <form role="form" class="row" method="POST"
                                        action={{ route('menurecipe.create', $menu->id) }}>
                                        @csrf
                                        <div class="col-3">
                                            <label class="form-label">Bahan</label>
                                            <select class="form-control" name="bahan">
                                                @foreach ($materials as $material)
                                                    <option value="{{ $material->id }}"
                                                        data-weight="{{ $material->weight }}"
                                                        data-price="{{ $material->price }}"
                                                        data-unit="{{ $material->unit }}">{{ $material->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            <label class="form-label">&nbsp;&nbsp;</label>
                                            <button type="submit"
                                                class="form-control border-2 border-red-700 rounded-lg px-4 py-2 bg-red-700 text-white font-bold cursor-pointer hover:bg-red-800">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <div class="row">
                            <div class="col-12">
                                <table class="">
                                    <thead class="text-center">
                                        <tr class="text-red-700">
                                            <th
                                                class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                                No</th>
                                            <th
                                                class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                                Nama</th>
                                            <th
                                                class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                                Berat</th>
                                            <th
                                                class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                                Total Biaya</th>
                                            <th
                                                class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                                Harga Dasar</th>
                                            <th
                                                class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-lg">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-xs">
                                        @foreach ($menu_recipes as $index => $menu_recipe)
                                            <tr>
                                                <th colspan="5">
                                                    <div class="collapseFormAdd hidden col-12 border-[1px] border-gray-500 border-t-[2px] border-b-[5px] border-r-[5px] border-l-[5px] mb-1 mt-3"
                                                        data-id="collapseFormAdd-{{ $menu_recipe->id }}">
                                                        <div class="card card-body">
                                                            <h5 class="text-uppercase py-2 font-weight-bolder">Edit
                                                                Bahan ({{ $menu_recipe->id }})</h5>
                                                            <form role="form" class="row" method="POST"
                                                                action={{ route('menurecipe.edit', $menu->id) }}>
                                                                @csrf
                                                                <input type="hidden" name="menu_recipe_id"
                                                                    value="{{ $menu_recipe->id }}">
                                                                <input type="hidden" name="menu_id"
                                                                    value="{{ $menu_recipe->menu_id }}">
                                                                <div class="col-3">
                                                                    <label class="form-label">Bahan</label>
                                                                    <select class="form-control" name="bahan">
                                                                        @foreach ($materials as $material)
                                                                            <option value="{{ $material->id }}"
                                                                                data-weight="{{ $material->weight }}"
                                                                                data-price="{{ $material->price }}"
                                                                                data-unit="{{ $material->unit }}"
                                                                                {{ $menu_recipe->material_id == $material->id ? 'selected' : '' }}>
                                                                                {{ $material->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label class="form-label">Berat</label>
                                                                    <input type="text" name="weight"
                                                                        class="form-control"
                                                                        value="{{ $menu_recipe->weight }}"
                                                                        placeholder="..." aria-label="Weight"
                                                                        aria-describedby="invalidCheckWeight">
                                                                </div>
                                                                <div class="col-3">
                                                                    <label class="form-label">Satuan</label>
                                                                    <select class="form-control" name="unit">
                                                                        @foreach ($units as $unit)
                                                                            <option value="{{ $unit->code }}"
                                                                                {{ $unit->code == $menu_recipe->unit ? 'selected' : '' }}>
                                                                                {{ $unit->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label
                                                                        class="form-label">&nbsp;&nbsp;</label><br />
                                                                    <button type="submit"
                                                                        class="form-control btn btn-success">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td class="border-[1px] border-red-700 px-4 py-2 text-sm">
                                                    {{ $index + 1 }}</td>
                                                <td class="border-[1px] border-red-700 px-6 py-1 text-sm">
                                                    {{ $menu_recipe->material->name }}
                                                    <a href="{{ route('material.show', $menu_recipe->material_id) }}"
                                                        class="text-md border-2 border-red-700 hover:bg-red-700 hover:text-white text-red-700 px-2 rounded-lg btn-delete-recipe cursor-pointer ml-1">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                </td>
                                                <td class="border-[1px] border-red-700 px-6 py-1 text-sm">
                                                    {{ $menu_recipe->weight }} {{ $menu_recipe->unit }}</td>
                                                <td class="border-[1px] border-red-700 px-4 py-1 text-sm">
                                                    Rp.
                                                    {{ number_format($menu_recipe->total_cost) }}</td>
                                                <td class="border-[1px] border-red-700 px-4 py-1 text-sm">
                                                    {{ $menu_recipe->material->weight }} {{ $menu_recipe->material->unit }} / Rp. {{ number_format($menu_recipe->material->price) }}
                                                </td>
                                                <td
                                                    class="border-[1px] border-red-700 px-4 py-1 font-weight-bolder text-uppercase text-sm">
                                                    <a class="text-md btn-edit-recipe border-2 border-red-700 hover:bg-red-700 hover:text-white text-red-700 px-2 py-[1px] rounded-lg cursor-pointer"
                                                        data-target="collapseFormAdd-{{ $menu_recipe->id }}"
                                                        data-menu-id="{{ $menu_recipe->menu_id }}"
                                                        data-material-id="{{ $menu_recipe->material_id }}"
                                                        data-weight={{ $menu_recipe->weight }}
                                                        data-unit="{{ $menu_recipe->unit }}">
                                                        <i class="fa fa-edit"></i>&nbsp; Edit
                                                    </a>
                                                    <a data-url="{{ route('menu_recipe.delete', [$menu->id, $menu_recipe->id]) }}"
                                                        data-name="{{ $menu_recipe->material->name }}"
                                                        data-weight="{{ $menu_recipe->weight }}"
                                                        data-total="Rp. {{ number_format($menu_recipe->total_cost) }}"
                                                        data-bs-toggle="modal" data-bs-target="#modalDeleteConfirmation"
                                                        class="text-md border-2 border-red-700 hover:bg-red-700 hover:text-white text-red-700 px-2 py-[1px] rounded-lg btn-delete-menu-recipe cursor-pointer ml-1">
                                                        <i class="fa fa-trash"></i>&nbsp; Delete
                                                    </a>
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
    </div>
</main>
<div class="modal fade" id="modalDeleteConfirmation" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menghapus data Bahan ini?</h4><br />
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-name"></span></td>
                    </tr>
                    <tr>
                        <td>Berat</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-weight"></span></td>
                    </tr>
                    <tr>
                        <td>Total Biaya</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-total"></span></td>
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
            console.log("btn-edit-recipe invoked!")
            event.preventDefault();
            var data_menu_id = $(this).data("menu-id");
            var data_material_id = $(this).data("material-id");
            var data_weight = $(this).data("weight");
            var data_unit = $(this).data("unit");
            var data_target = $(this).data("target");
            console.log("btn-edit-recipe", "=>", data_menu_id, data_material_id, data_weight,
                data_unit);

            $(".collapseFormAdd").each(function(index) {
                var collapseElement = $(this);
                var collapseElementID = collapseElement.data("id");
                if (collapseElementID == data_target) {
                    collapseElement.removeClass("hidden");
                } else {
                    collapseElement.addClass("hidden");
                }
                console.log("data-id", collapseElement.data("id"), data_target)
            });
        });

        $(".btn-add-material").on("click", function(event) {
            console.log("btn-add-material clicked!")
            event.preventDefault()
            var data_target = $(this).data("target");
            console.log("btn-add-material", data_target)
            $(data_target).removeClass("collapse");
            $(data_target).addClass("show");
        });

        $(".btn-delete-menu-recipe").on("click", function() {
            var data_name = $(this).data("name");
            $(".modal-name").text(data_name);
            var data_weight = $(this).data("weight");
            $(".modal-weight").text(data_weight);
            var data_total = $(this).data("total");
            $(".modal-total").text(data_total);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-delete").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')
