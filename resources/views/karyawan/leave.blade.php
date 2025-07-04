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
                                            class="text-center text-xs {{ $leave->status == 'Declined' ? 'table-danger' : ($leave->status == 'Diterima' ? 'table-success' : '') }}">
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
                                                    <a
                                                        href="{{ route('karyawan.leave_action', [$leave->id, 'Ditolak']) }}"><i
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
@include('dashboard.footer')
