@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-8">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-uppercase">List Karyawan</h3>
                            </div>
                            <div class="col-6 text-end"><a href="{{ route('karyawan.create') }}">
                                    <div class="btn btn-success">Tambah Karyawan Baru</div>
                                </a></div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-xs font-weight-bolder">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-uppercase text-xs font-weight-bolder">No. Telepon</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Email</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Bergabung Sejak</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">#</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('dashboard.footer')