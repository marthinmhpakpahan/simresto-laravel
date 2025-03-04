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
                                <h4>Buat Cuti Baru</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route("karyawan.leave") }}">
                                    <div class="btn btn-success">List Cuti</div>
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
                            <form role="form" id="form-user" method="POST" action="{{ route('karyawan.create_leave') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="start_date"
                                            class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="StartDate"
                                            aria-describedby="invalidCheckStartDate">
                                        @if($errors->has('start_date'))
                                        <div id="invalidCheckStartDate" class="invalid-feedback">
                                            {{ $errors->first('start_date') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label">End Date</label>
                                        <input type="date" name="end_date"
                                            class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="EndDate" aria-describedby="invalidCheckEndDate">
                                        @if($errors->has('end_date'))
                                        <div id="invalidCheckEndDate" class="invalid-feedback">
                                            {{ $errors->first('end_date') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6 col-xs-12">
                                        <label class="form-label">Judul</label>
                                        <input type="text" name="title"
                                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="Title" aria-describedby="invalidCheckTitle">
                                        @if($errors->has('title'))
                                        <div id="invalidCheckTitle" class="invalid-feedback">
                                            {{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-6 col-xs-12">
                                        <label class="form-label">Lampiran</label>
                                        <input type="file" name="attachment"
                                            class="form-control {{ $errors->has('attachment') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="Attachment"
                                            aria-describedby="invalidCheckAttachment">
                                        @if($errors->has('attachment'))
                                        <div id="invalidCheckAttachment" class="invalid-feedback">
                                            {{ $errors->first('attachment') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12 col-xs-12">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea type="text" name="description" rows="15"
                                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="Description"
                                            aria-describedby="invalidCheckDescription"></textarea>
                                        @if($errors->has('description'))
                                        <div id="invalidCheckDescription" class="invalid-feedback">
                                            {{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambahkan
                                        Cuti</button>
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