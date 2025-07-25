@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 flex flex-col sm:flex-row">
                        <div
                            class="text-uppercase text-center sm:text-start text-lg sm:text-3xl font-bold text-red-700 flex justify-center sm:justify-start sm:w-full">
                            Daftar Cuti Karyawan</div>
                        <div class="sm:w-full flex justify-center sm:justify-end">
                            <a class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"
                                href="{{ route('karyawan.create_leave') }}">
                                <i class="fa fa-plus"></i> Pengajuan Cuti
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Judul</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal Mulai
                                        </th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal
                                            Selesai</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Deskripsi</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">File Lampiran</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaves as $index => $leave)
                                        <tr
                                            class="text-center text-xs {{ $leave->status == 'Ditolak' ? 'table-danger' : ($leave->status == 'Diterima' ? 'table-success' : '') }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $leave->title }}</td>
                                            <td>{{ date('d F Y', strtotime($leave->start_date)) }}</td>
                                            <td>{{ date('d F Y', strtotime($leave->end_date)) }}</td>
                                            <td>{{ $leave->description }}</td>
                                            <td><a href="/{{ $leave->attachment }}" target="_blank"><i
                                                        class="fa fa-download btn btn-xs btn-danger"></i></a></td>
                                            <td class="font-weight-bolder text-uppercase">{{ $leave->status }}</td>
                                            <td>
                                                @if ($leave->status == 'Belum Diproses')
                                                    <a class="btn-cancel-leave"
                                                        data-url="{{ route("karyawan.leave_action", [$leave->id, 'Dibatalkan']) }}"
                                                        data-title="{{ $leave->title }}"
                                                        data-start-date="{{ date('d F Y', strtotime($leave->start_date)) }}"
                                                        data-end-date="{{ date('d F Y', strtotime($leave->end_date)) }}"
                                                        data-bs-toggle="modal" data-bs-target="#modalCancelConfirmation"
                                                        href="#"><i
                                                            class="fa fa-close btn btn-xs btn-danger"></i></a>
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
<div class="modal fade" id="modalCancelConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h1 class="modal-title fs-5 text-center text-white" id="staticBackdropLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin ingin membatalkan data Cuti ini?</h4><br />
                <table>
                    <tr>
                        <td>Judul</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-cancel-title"></span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-cancel-start-date"></span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><span class="modal-cancel-end-date"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a class="modal-btn-confirm-cancel" href=""><button type="button"
                        class="btn btn-danger">Yakin!</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("Leave Karyawan Page!");
        $(".btn-cancel-leave").on("click", function() {
            var data_title = $(this).data("title");
            $(".modal-cancel-title").text(data_title);
            var data_start_date = $(this).data("start-date");
            $(".modal-cancel-start-date").text(data_start_date);
            var data_end_date = $(this).data("end-date");
            $(".modal-cancel-end-date").text(data_end_date);
            var data_url = $(this).data("url");
            $(".modal-btn-confirm-cancel").attr("href", data_url);
        });
    });
</script>
@include('dashboard.footer')
