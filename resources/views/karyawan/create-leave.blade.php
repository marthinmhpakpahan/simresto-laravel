@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-12 sm:col-6 text-center sm:text-start">
                                <h4 class="text-uppercase text-xl sm:text-3xl font-bold text-red-700"><i class="fa fa-plus-square"></i>&nbsp;Buat Cuti Baru</h4>
                            </div>
                            <div class="col-12 sm:col-6 text-center sm:text-end mt-4 sm:mt-0">
                                <a class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer" href="{{ route("karyawan.leave") }}">
                                    <i class="fa fa-list"></i> List Cuti
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
                                    <div class="mb-3 sm:col-6">
                                        <label class="form-label text-red-700 text-base">Tanggal Mulai Cuti</label>
                                        <input type="date" name="start_date"
                                            class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="StartDate"
                                            aria-describedby="invalidCheckStartDate">
                                        @if($errors->has('start_date'))
                                        <div id="invalidCheckStartDate" class="invalid-feedback">
                                            {{ $errors->first('start_date') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 sm:col-6">
                                        <label class="form-label text-red-700 text-base">Tanggal Selesai Cuti</label>
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
                                    <div class="mb-3 sm:col-6">
                                        <label class="form-label text-red-700 text-base">Judul</label>
                                        <input type="text" name="title"
                                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="Title" aria-describedby="invalidCheckTitle">
                                        @if($errors->has('title'))
                                        <div id="invalidCheckTitle" class="invalid-feedback">
                                            {{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-6 col-xs-12">
                                        <label class="form-label text-red-700 text-base">Lampiran</label>
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
                                        <label class="form-label text-red-700 text-base">Deskripsi</label>
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
                                    <button type="submit" class="font-bold text-red-800 w-max px-5 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"><i class="fa fa-paper-plane"></i> Ajukan Cuti</button>
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
        console.log("Attendance Karyawan Page!");
        console.log($("input[type=date]").name);
        $("input[type=date]").on("click", function() {
            $(this).showPicker();
        });
    });
</script>
@include('dashboard.footer')