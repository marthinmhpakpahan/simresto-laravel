@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xs-12 items-center">
                                <h3 class="text-uppercase {{ !$attendance ? "text-red-700 font-bold text-2xl" : ($attendance->finished_at ? "text-green-700 font-bold text-2xl" : "text-red-700 font-bold text-2xl")  }}">{{ !$attendance ? "Anda belum checkin hari ini !!!" : ($attendance->finished_at ? "Absensi hari ini sudah lengkap!" : "Anda belum checkout hari ini !!!") }}</h3>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xs-12 flex justify-end {{ $attendance && $attendance->finished_at ? "d-none" : "" }}">
                                <div class="btn-check-in-out font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer">
                                    <i class="fa {{ !$attendance ? 'fa-right-to-bracket' : 'fa-right-from-bracket'  }}"></i> {{ !$attendance ? "Check In Sekarang" : "Check Out Sekarang"  }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="collapse col-12" id="collapseFormAdd">
                            <div class="card card-body">
                                <h5 class="text-uppercase font-bold text-red-700 text-2xl text-center mt-2 mb-5">Upload Foto Sebagai Bukti</h5>
                                <form role="form" class="row" method="POST" action={{ route("karyawan.validate_attendance") }} enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6 col-xs-12 flex flex-col justify-center mx-auto">
                                        <img class="form-control visually-hidden img-thumbnail" id="img_checkin" src="#" alt="" />
                                        <input type="file" name="image"
                                            class="form-control my-3"
                                            data-img_element="img_checkin"
                                            placeholder="..." aria-label="Image"
                                            aria-describedby="invalidCheckImage">
                                        <button type="submit" class="font-bold text-red-800 w-max mx-auto px-5 py-2 border-2 border-red-700 rounded-lg hover:bg-red-900 hover:text-white cursor-pointer">Upload</button>
                                    </div>
                                </form>
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
                                <h3 class="text-uppercase text-3xl font-bold text-red-700">Daftar Hadir</h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $index => $attendance)
                                        <tr class="text-center text-sm  {{ $attendance->status == 'Confirmed' ? "table-success" : ($attendance->status == "Declined" ? 'table-danger' : '') }}">
                                            <td>{{ ($index+1) }}</td>
                                            <td>{{ (new DateTime($attendance->created_at))->format('d F Y') }}</td>
                                            <td>
                                                {{ (new DateTime($attendance->started_at))->format('H:i:s') }} 
                                                @if ($attendance->started_at)
                                                    &nbsp; <i class="fa fa-image btn btn-primary btn-xs btn-detail-image" data-image="/{{ $attendance->started_path }}" data-bs-toggle="modal"
                                                        data-bs-target="#modalDetailImage"></i>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $attendance && $attendance->finished_at ? (new DateTime($attendance->finished_at))->format('H:i:s') : "-" }}
                                                @if ($attendance->finished_at)
                                                    &nbsp; <i class="fa fa-image btn btn-primary btn-xs btn-detail-image" data-image="/{{ $attendance->finished_path }}" data-bs-toggle="modal"
                                                        data-bs-target="#modalDetailImage"></i>
                                                @endif
                                            </td>
                                            <td class="font-weight-bolder">{{ $attendance->status }}</td>
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
<div class="modal fade modal-lg" id="modalDetailImage" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="modal-detail-image-image img-fluid" src="" alt="" />
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("Attendance Karyawan Page!");
        $(".btn-detail-image").on("click", function() {
            var data_image = $(this).data("image");
            $(".modal-detail-image-image").attr("src", data_image);
        });

        $(".btn-check-in-out").on("click", function() {
            console.log("btn-check-in-out clicked!");
            var element = $("#collapseFormAdd");
            console.log(element);
            var collapsed = element.hasClass("collapse");
            if(collapsed) {
                element.removeClass("collapse");
                element.addClass("show");
            } else {
                element.removeClass("show");
                element.addClass("collapse");
            }
        });
    });
</script>
@include('dashboard.footer')