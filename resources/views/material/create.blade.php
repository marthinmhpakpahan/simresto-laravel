@include('dashboard.header')
<div class="border border-black shadow-[6px_6px_6px_#DA6C6C] mx-5 mt-2 rounded-xl px-4 py-5 bg-white">
    <div class="flex flex-row justify-between items-center">
        <p class="font-bold text-red-800 text-4xl"><i class="fa fa-plus-square"></i>&nbsp;{{ $page_title }}</p>
        <a href="{{ route('material.index') }}"
            class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"><i
                class="fa fa-list"></i>&nbsp;&nbsp;Lihat Daftar Bahan</a>
    </div>
    <div class="flex flex-row w-full mt-4">
        <div class="flex flex-col w-full mr-2">
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
            <form role="form" id="form-user" method="POST" action="{{ route('material.create') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-row w-full">
                        <div class="flex flex-col w-full mr-2">
                            <div class="flex flex-col">
                                <div class="mb-3 col-12">
                                    <label class="text-red-800 font-semibold text-base">Nama Bahan</label>
                                    <input type="text" name="name"
                                        class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        placeholder="..." aria-label="Name" aria-describedby="invalidCheckName">
                                    @if ($errors->has('name'))
                                        <div id="invalidCheckName" class="invalid-feedback">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="text-red-800 font-semibold text-base">Total Harga</label>
                                    <input type="text" name="price"
                                        class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                        placeholder="10..." aria-label="Price" aria-describedby="invalidCheckPrice">
                                    @if ($errors->has('price'))
                                        <div id="invalidCheckPrice" class="invalid-feedback">
                                            {{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="text-red-800 font-semibold text-base">Berat</label>
                                    <input type="text" name="weight"
                                        class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('weight') ? 'is-invalid' : '' }}"
                                        placeholder="10..." aria-label="Weight" aria-describedby="invalidCheckWeight">
                                    @if ($errors->has('weight'))
                                        <div id="invalidCheckWeight" class="invalid-feedback">
                                            {{ $errors->first('weight') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="text-red-800 font-semibold text-base">Satuan Berat</label>
                                    <select class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500" name="unit">
                                        <option value="MG">Miligram (mg)</option>
                                        <option value="G">Gram (g)</option>
                                        <option value="OZ">Ounce (oz)</option>
                                        <option value="LB">Pound (lb)</option>
                                        <option value="KG">Kilogram (kg)</option>
                                        <option value="KW">Kwintal (kw)</option>
                                        <option value="T">Ton (t)</option>
                                        <option value="ML">Mililiter (ml)</option>
                                        <option value="CL">Centiliter (cl)</option>
                                        <option value="DL">Desiliter (dl)</option>
                                        <option value="L">Liter (l)</option>
                                        <option value="DL">Dekaliter (dl)</option>
                                        <option value="HL">Hektoliter (hl)</option>
                                        <option value="KL">Kiloliter (kl)</option>
                                    </select>
                                    @if ($errors->has('unit'))
                                        <div id="invalidCheckUnit" class="invalid-feedback">
                                            {{ $errors->first('unit') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="text-red-800 font-semibold text-base">Deskripsi</label>
                                    <textarea type="text" name="description" rows="10"
                                        class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Bill..."
                                        aria-label="Description" aria-describedby="invalidCheckDescription"></textarea>
                                    @if ($errors->has('description'))
                                        <div id="invalidCheckDescription" class="invalid-feedback">
                                            {{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full mr-2">
                            <div class="flex flex-col">
                                <div class="mb-3 col-12">
                                    <label class="text-red-800 font-semibold text-base">Foto</label>
                                    <div class="flex justify-center">
                                        <img class="form-control visually-hidden h-96 w-auto" id="img_photo" src="#" alt="" />
                                    </div>
                                    <input type="file" name="image"
                                        class="form-control w-full px-3 py-2 mt-1 rounded-lg focus:border-yellow-500 border-gray-500 {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                        placeholder="Image" aria-label="Image" data-img_element="img_photo"
                                        aria-describedby="invalidCheckImage">
                                    @if ($errors->has('image'))
                                        <div id="invalidCheckImage" class="invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="font-bold text-red-800 w-max px-7 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('dashboard.footer')
