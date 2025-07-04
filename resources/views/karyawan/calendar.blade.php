@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-uppercase text-3xl font-bold text-red-700 text-center"><i class="fa fa-list"></i>&nbsp;Daftar Hadir Karyawan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 pt-0 pb-4">
                        {!! $calendar !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('dashboard.footer')