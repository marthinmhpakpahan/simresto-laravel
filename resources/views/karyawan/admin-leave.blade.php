@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-uppercase text-3xl font-bold text-red-700">Daftar Cuti Karyawan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Judul</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal Mulai</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal Selesai</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Deskripsi</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">File Lampiran</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaves as $index => $leave)
                                        <tr class="text-center text-xs {{ $leave->status == 'Ditolak' ? 'table-danger' : ($leave->status == 'Diterima' ? 'table-success' : '') }}">
                                            <td>{{ ($index+1) }}</td>
                                            <td>{{ $leave->title }}</td>
                                            <td>{{ date("d F Y", strtotime($leave->start_date)) }}</td>
                                            <td>{{ date("d F Y", strtotime($leave->end_date)) }}</td>
                                            <td>{{ $leave->description }}</td>
                                            <td><a href="/{{ $leave->attachment }}" target="_blank"><i class="fa fa-download btn btn-xs btn-danger"></i></a></td>
                                            <td class="font-weight-bolder text-uppercase">{{ $leave->status }}</td>
                                            <td>
                                                @if ($leave->status == "Belum Diproses")
                                                    <a class="btn-accept" data-bs-toggle="modal" data-bs-target="#modalAcceptConfirmation" data-url="{{ route("karyawan.leave_action", [$leave->id, 'Diterima']) }}" data-full-name="{{ $leave->user->full_name }}" data-title="{{ $leave->title }}" data-start-date="{{ date('d F Y', strtotime($leave->start_date)) }}" data-end-date="{{ date('d F Y', strtotime($leave->end_date)) }}" href="#"><i class="fa fa-check btn btn-xs btn-success"></i></a>
                                                    <a class="btn-decline" data-bs-toggle="modal" data-bs-target="#modalDeclineConfirmation" data-url="{{ route("karyawan.leave_action", [$leave->id, 'Ditolak']) }}" data-full-name="{{ $leave->user->full_name }}" data-title="{{ $leave->title }}" data-start-date="{{ date('d F Y', strtotime($leave->start_date)) }}" data-end-date="{{ date('d F Y', strtotime($leave->end_date)) }}" href="#"><i class="fa fa-close btn btn-xs btn-danger"></i></a>
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
<div class="modal fade" id="modalAcceptConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menyetujui Pengajuan Cuti ini?</h4><br />
                <table>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-accept-full-name"></span></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-accept-title"></span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-accept-start-date"></span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-accept-end-date"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="modal-btn-confirm-accept" href=""><button type="button"
                        class="btn btn-danger">Yakin!</button></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDeclineConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin menolak Pengajuan Cuti ini?</h4><br />
                <table>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-decline-full-name"></span></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-decline-title"></span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-decline-start-date"></span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-decline-end-date"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="modal-btn-confirm-decline" href=""><button type="button"
                        class="btn btn-danger">Yakin</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("Leave Karyawan Page!");
        $(".btn-accept").on("click", function() {
            var data_full_name = $(this).data("full-name");
            $(".modal-accept-full-name").text(data_full_name);
            var data_title = $(this).data("title");
            $(".modal-accept-title").text(data_title);
            var data_start_date = $(this).data("start-date");
            $(".modal-accept-start-date").text(data_start_date);
            var data_end_date = $(this).data("end-date");
            $(".modal-accept-end-date").text(data_end_date);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-accept").attr("href", data_url);
        });
        $(".btn-decline").on("click", function() {
            var data_full_name = $(this).data("full-name");
            $(".modal-decline-full-name").text(data_full_name);
            var data_title = $(this).data("title");
            $(".modal-decline-title").text(data_title);
            var data_start_date = $(this).data("start-date");
            $(".modal-decline-start-date").text(data_start_date);
            var data_end_date = $(this).data("end-date");
            $(".modal-decline-end-date").text(data_end_date);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-decline").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')