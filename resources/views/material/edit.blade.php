@include('dashboard.header')
<div class="border border-black shadow-[6px_6px_6px_#DA6C6C] mx-5 mt-8 rounded-xl px-4 py-5 bg-white">
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
    <form role="form" method="POST" action="{{ route('material.edit', $material->id) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="flex flex-row justify-between items-center">
            <p class="font-bold text-red-800 text-4xl">Edit Bahan - {{ $material->id }}</p>
            <a href="{{ route('material.index') }}"
                class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"><i
                    class="fa fa-list"></i>&nbsp;&nbsp;Lihat Daftar Bahan</a>
        </div>
        <div class="flex flex-row w-full mt-6">
            <div class="flex flex-col w-full mr-2">
                <div class="flex flex-col">
                    <div class="text-red-800 font-semibold">Nama Bahan</div>
                    <div><input type="text" name="name" value="{{ old('name', $material->name) }}"
                            class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            aria-describedby="invalidCheckName" /></div>
                    @if ($errors->has('name'))
                        <div id="invalidCheckName" class="text-red-700 justify-end ml-1">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <div class="text-red-800 font-semibold">Gambar Bahan</div>
                    <div><input type="file" name="image"
                            class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500" />
                    </div>
                    @if ($errors->has('image'))
                        <div id="invalidCheckImage" class="text-red-700 justify-end ml-1">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <div class="text-red-800 font-semibold">Harga</div>
                    <div><input type="text" name="price" value="{{ old('price', $material->price) }}"
                            class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500" />
                    </div>
                    @if ($errors->has('price'))
                        <div id="invalidCheckPrice" class="text-red-700 justify-end ml-1">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-row mt-3 justify-start w-full">
                    <div class="flex flex-col w-3/4 mr-2">
                        <div class="text-red-800 font-semibold">Ukuran</div>
                        <div><input name="weight" type="text"
                                class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500"
                                value="{{ old('weight', $material->weight) }}" /></div>
                        @if ($errors->has('weight'))
                            <div id="invalidCheckWeight" class="text-red-700 justify-end ml-1">
                                {{ $errors->first('weight') }}
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col w-1/4 ml-1">
                        <div class="text-red-800 font-semibold">Unit</div>
                        <div>
                            <select
                                class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500"
                                name="unit">
                                <option value="0">Pilih Unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->code }}"
                                        {{ $unit->code == $material->unit ? 'selected' : '' }}>{{ $unit->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('unit'))
                                <div id="invalidCheckUnit" class="text-red-700 justify-end ml-1">
                                    {{ $errors->first('unit') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full ml-2">
                <div class="flex flex-col">
                    <div class="text-red-800 font-semibold">Deskripsi</div>
                    <div>
                        <textarea rows="12" type="text" name="description"
                            class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500">{{ $material->description }}</textarea>
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
@include('dashboard.footer')
