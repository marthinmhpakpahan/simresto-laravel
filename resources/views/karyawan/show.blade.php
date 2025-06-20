@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <h3 class="text-uppercase font-bold text-2xl text-red-700 mb-2">Data Karyawan #{{ $karyawan->id }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 pt-0 pb-4">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div id="carouselExampleCaptions" class="carousel slide">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleCaptions"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="/{{ $karyawan->photo }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5 class="badge text-bg-primary text-wrap text-white">Foto Profil Karyawan</h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/{{ $karyawan->identity_card }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5 class="badge text-bg-primary text-wrap text-white">Kartu Identitas Karyawan</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <table class="table">
                                    <thead>
                                        <tr class="fw-bolder">
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td>{{ $karyawan->full_name }}</td>
                                        </tr>
                                        <tr class="fw-bolder">
                                            <td>Username</td>
                                            <td>:</td>
                                            <td>{{ $karyawan->username }}</td>
                                        </tr>
                                        <tr class="fw-bolder">
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{ $karyawan->email }}</td>
                                        </tr>
                                        <tr class="fw-bolder">
                                            <td>No. Telp</td>
                                            <td>:</td>
                                            <td>{{ $karyawan->phone_no }}</td>
                                        </tr>
                                        <tr class="fw-bolder">
                                            <td>Gaji</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($karyawan->salary) }}</td>
                                        </tr>
                                        <tr class="fw-bolder">
                                            <td>Bergabung Sejak</td>
                                            <td>:</td>
                                            <td>{{ date("d F Y", strtotime($karyawan->joined_since)) }}</td>
                                        </tr>
                                        <tr class="fw-bolder">
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>{{ $karyawan->status ? "Active" : "Inactive" }}</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
                            <div class="col-md-6 col-xs-12">
                                <h3 class="text-uppercase">Daftar Hadir</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Tanggal</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Jam Masuk</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Jam Keluar</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $index => $attendance)
                                    <tr class="text-center text-sm {{ $attendance->status == 'Confirmed' ? "table-success" : ($attendance->status == "Declined" ? 'table-danger' : '') }}">
                                        <td>{{ ($index+1) }}</td>
                                        <td>{{ (new DateTime($attendance->created_at))->format('d F Y') }}</td>
                                        <td>
                                            {{ (new DateTime($attendance->started_at))->format('H:i:s') }}
                                            @if ($attendance->started_at)
                                            &nbsp; <a target="_blank" href="/{{ $attendance->started_path }}"><i class="fa fa-eye btn btn-primary btn-xs btn-detail-image"
                                                data-image="/{{ $attendance->started_path }}" data-bs-toggle="modal"
                                                data-bs-target="#modalDetailImage"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $attendance && $attendance->finished_at ? (new DateTime($attendance->finished_at))->format('H:i:s') : "-" }}
                                            @if ($attendance->finished_at)
                                            &nbsp; <a target="_blank" href="/{{ $attendance->finished_path }}"><i class="fa fa-eye btn btn-primary btn-xs btn-detail-image"
                                                data-image="/{{ $attendance->finished_path }}" data-bs-toggle="modal"
                                                data-bs-target="#modalDetailImage"></i></a>
                                            @endif
                                        </td>
                                        <td class="font-weight-bolder">{{ $attendance->status }}</td>
                                        <td>
                                            @if($attendance->status == "Pending")
                                            <i class="btn btn-success btn-xs text-md fa fa-check btn-confirm-attendance" data-confirm_url="{{ route('karyawan.confirm_attendance', [$attendance->user_id, $attendance->id]) }}" data-no="{{ ($index+1) }}" data-start_time="{{ $attendance->started_at }}" data-finished_time="{{ $attendance->finished_at }}" data-bs-toggle="modal"
                                                data-bs-target="#modalAttendanceConfirm"></i>
                                            <i class="btn btn-danger btn-xs text-md fa fa-close btn-decline-attendance" data-decline_url="{{ route('karyawan.decline_attendance', [$attendance->user_id, $attendance->id]) }}" data-no="{{ ($index+1) }}" data-start_time="{{ $attendance->started_at }}" data-finished_time="{{ $attendance->finished_at }}" data-bs-toggle="modal"
                                                data-bs-target="#modalAttendanceDecline"></i>
                                            @endif
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
<div class="modal fade" id="modalAttendanceConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin mengkonfirmasi data kehadiran ini?</h4><br />
                <table>
                    <tr>
                        <td>No</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-no"></span></td>
                    </tr>
                    <tr>
                        <td>Jam Masuk</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-start_time"></span></td>
                    </tr>
                    <tr>
                        <td>Jam Keluar</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-finished_time"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="modal-btn-confirm-attendance" href=""><button type="button"
                        class="btn btn-success">Yakin!</button></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAttendanceDecline" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menolak data kehadiran ini?</h4><br />
                <table>
                    <tr>
                        <td>No</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-no"></span></td>
                    </tr>
                    <tr>
                        <td>Jam Masuk</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-start_time"></span></td>
                    </tr>
                    <tr>
                        <td>Jam Keluar</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-karyawan-finished_time"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="modal-btn-decline-attendance" href=""><button type="button"
                        class="btn btn-danger">Yakin!</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("Detail Karyawan Page!");
        $(".btn-confirm-attendance").on("click", function() {
            var data_no = $(this).data("no");
            $(".modal-karyawan-no").text(data_no);
            var data_start_time = $(this).data("start_time");
            $(".modal-karyawan-start_time").text(data_start_time);
            var data_finished_time = $(this).data("finished_time");
            $(".modal-karyawan-finished_time").text(data_finished_time);
            var data_confirm_url = $(this).data("confirm_url");
            $(".modal-btn-confirm-attendance").attr("href", data_confirm_url);
        });
        $(".btn-decline-attendance").on("click", function() {
            var data_no = $(this).data("no");
            $(".modal-karyawan-no").text(data_no);
            var data_start_time = $(this).data("start_time");
            $(".modal-karyawan-start_time").text(data_start_time);
            var data_finished_time = $(this).data("finished_time");
            $(".modal-karyawan-finished_time").text(data_finished_time);
            var data_decline_url = $(this).data("decline_url");
            $(".modal-btn-decline-attendance").attr("href", data_decline_url);
        });
    });
</script>
@include('dashboard.footer')