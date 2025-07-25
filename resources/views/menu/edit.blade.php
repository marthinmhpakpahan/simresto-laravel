@include('dashboard.header')
<div class="border border-black shadow-[6px_6px_6px_#DA6C6C] mx-5 mt-2 rounded-xl px-4 py-5 bg-white">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <strong>{!! session('success') !!}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- pesan gagal -->
    @if (session()->has('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{!! session('failed') !!}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- pesan error -->
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible show fade">
            <strong>{!! session('error') !!}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form role="form" method="POST" action="{{ route('menu.edit', $menu->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-row justify-between items-center">
            <p class="font-bold text-red-800 text-4xl">Ubah Menu - {{ $menu->name }}</p>
            <a href="{{ route('menu.index') }}"
                class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"><i
                    class="fa fa-list"></i>&nbsp;&nbsp;Lihat Daftar Menu</a>
        </div>
        <div class="flex flex-row w-full mt-6">
            <div class="flex flex-col w-full mr-2">
                <div class="flex flex-col">
                    <div class="text-red-800 font-semibold">Nama Menu</div>
                    <div><input type="text" name="name" value="{{ old('name', $menu->name) }}"
                            class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            aria-describedby="invalidCheckName" /></div>
                    @if ($errors->has('name'))
                        <div id="invalidCheckName" class="text-red-700 justify-end ml-1">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <div class="text-red-800 font-semibold">Kategori Menu</div>
                    <select
                        class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500"
                        name="menu_category_id">
                        <option value="0">Pilih Kategori</option>
                        @foreach ($menu_categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $menu->menu_category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('unit'))
                        <div id="invalidCheckUnit" class="text-red-700 justify-end ml-1">
                            {{ $errors->first('unit') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <div class="text-red-800 font-semibold">Gambar Menu</div>
                    <div><input type="file" name="image-multiple[]"
                            class="imageUploader form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500"
                            placeholder="Image" aria-label="Image" data-img_element="div_img_photo" multiple="multiple"
                            aria-describedby="invalidCheckImage">
                    </div>
                    <div id="imagePreviewContainer" class="image-preview-container flex flex-row flex-wrap mt-1 p-2">
                    </div>
                    @if ($errors->has('image'))
                        <div id="invalidCheckImage" class="text-red-700 justify-end ml-1">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col w-full ml-2">
                <div class="flex flex-col">
                    <div class="text-red-800 font-semibold">Deskripsi Menu</div>
                    <div>
                        <textarea rows="20" type="text" name="description"
                            class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500">{{ $menu->description }}</textarea>
                    </div>
                </div>
                <div class="flex flex-col items-end">
                    <button type="submit"
                        class="font-bold text-red-800 w-max px-6 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white"><i
                            class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-3"></div>
    </form>
</div>
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
