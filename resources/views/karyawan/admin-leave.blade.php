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
                                        <tr class="text-center text-xs {{ $leave->status == 'Declined' ? 'table-danger' : ($leave->status == 'Accepted' ? 'table-success' : '') }}">
                                            <td>{{ ($index+1) }}</td>
                                            <td>{{ $leave->title }}</td>
                                            <td>{{ date("d F Y", strtotime($leave->start_date)) }}</td>
                                            <td>{{ date("d F Y", strtotime($leave->end_date)) }}</td>
                                            <td>{{ $leave->description }}</td>
                                            <td><a href="/{{ $leave->attachment }}" target="_blank"><i class="fa fa-download btn btn-xs btn-danger"></i></a></td>
                                            <td class="font-weight-bolder text-uppercase">{{ $leave->status }}</td>
                                            <td>
                                                @if ($leave->status == "Pending")
                                                    <a href="{{ route("karyawan.leave_action", [$leave->id, 'Accepted']) }}"><i class="fa fa-check btn btn-xs btn-success"></i></a>
                                                    <a href="{{ route("karyawan.leave_action", [$leave->id, 'Declined']) }}"><i class="fa fa-close btn btn-xs btn-danger"></i></a>
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