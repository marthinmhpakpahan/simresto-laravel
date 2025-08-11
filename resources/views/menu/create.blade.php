@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                            <h4 class="text-uppercase text-3xl font-bold text-red-700"><i class="fa fa-plus-square"></i>&nbsp;{{ $page_title }}</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer" href="{{ route("menu.index") }}"><i class="fa fa-list"></i> List Menu
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="card-body">
                            @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <strong>{!!session('success')!!}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <!-- pesan gagal -->
                            @if(session()->has('failed'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{!!session('failed')!!}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <!-- pesan error -->
                            @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <strong>{!!session('error')!!}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <form role="form" id="form-user" method="POST" action="{{ route('menu.create') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Nama Menu</label>
                                        <input type="text" name="name"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            placeholder="..." aria-label="Name"
                                            aria-describedby="invalidCheckName">
                                        @if($errors->has('name'))
                                        <div id="invalidCheckName" class="invalid-feedback">
                                            {{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control" name="menu_category_id">
                                            @foreach ($menu_categories as $menu_category)
                                                <option value="{{ $menu_category->id }}">{{ $menu_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('menu_category_id'))
                                        <div id="invalidCheckMenuCategoryId" class="invalid-feedback">
                                            {{ $errors->first('menu_category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="image-multiple[]"
                                        class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                        placeholder="Image" aria-label="Image"
                                        aria-label="Image" data-img_element="div_img_photo" multiple="multiple"
                                        aria-describedby="invalidCheckImage">
                                    <div id="imagePreviewContainer" class="image-preview-container flex flex-row flex-wrap mt-1 p-2">
                                        </div>
                                    @if($errors->has('image'))
                                    <div id="invalidCheckImage" class="invalid-feedback">
                                        {{ $errors->first('image') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea type="text" name="description" rows="10"
                                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            placeholder="Bill..." aria-label="Description"
                                            aria-describedby="invalidCheckDescription"></textarea>
                                        @if($errors->has('description'))
                                        <div id="invalidCheckDescription" class="invalid-feedback">
                                            {{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="font-bold text-red-800 w-max px-6 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        const $imageUploader = $("input.imageUploader");
        const $imagePreviewContainer = $("#imagePreviewContainer");

        console.log("Edit Menu Page!");
        $imageUploader.on("change", function() {
            // Clear previous images using jQuery's .empty()
            $imagePreviewContainer.empty();

            // Get the files from the event object
            const files = event.target.files;

            $.each(files, function(index, file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Create a wrapper div for each image and button
                        const $wrapper = $('<div>')
                            .addClass(
                                'relative border border-gray-300 p-2 shadow-md inline-block mr-2'
                            ); // Tailwind classes for wrapper

                        // Create the image element
                        $('<img>')
                            .attr('src', e.target.result)
                            .addClass(
                                'max-w-[200px] max-h-[200px] object-cover block'
                                ) // Tailwind classes for image
                            .appendTo($wrapper);

                        $wrapper.appendTo($imagePreviewContainer);
                    };

                    reader.readAsDataURL(file);
                } else {
                    console.warn(
                        `File ${file.name} is not an image and will not be displayed.`);
                }
            });
        });
    });
</script>
@include('dashboard.footer')