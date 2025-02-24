@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-8">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                            <h4>{{ $page_title }}</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route("material.index") }}">
                                    <div class="btn btn-success">List Bahan</div>
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
                            <form role="form" id="form-user" method="POST" action="{{ route('material.create') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Nama Bahan</label>
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
                                        <label class="form-label">Total Harga</label>
                                        <input type="text" name="price"
                                            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                            placeholder="10..." aria-label="Price"
                                            aria-describedby="invalidCheckPrice">
                                        @if($errors->has('price'))
                                        <div id="invalidCheckPrice" class="invalid-feedback">
                                            {{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
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
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Foto</label>
                                        <img class="form-control visually-hidden img-fluid" id="img_photo" src="#" alt="" />
                                        <input type="file" name="image"
                                            class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                            placeholder="Image" aria-label="Image"
                                            data-img_element="img_photo"
                                            aria-describedby="invalidCheckImage">
                                        @if($errors->has('image'))
                                        <div id="invalidCheckImage" class="invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Berat</label>
                                        <input type="text" name="weight"
                                            class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}"
                                            placeholder="10..." aria-label="Weight"
                                            aria-describedby="invalidCheckWeight">
                                        @if($errors->has('weight'))
                                        <div id="invalidCheckWeight" class="invalid-feedback">
                                            {{ $errors->first('weight') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Satuan Berat</label>
                                        <select class="form-control" name="unit">
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
                                        @if($errors->has('unit'))
                                        <div id="invalidCheckUnit" class="invalid-feedback">
                                            {{ $errors->first('unit') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('dashboard.footer')