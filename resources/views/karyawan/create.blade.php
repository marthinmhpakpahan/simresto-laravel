@include('dashboard.header')
<main class="main-content position-relative border-radius-lg mt-2">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                            <h4 class="text-uppercase text-3xl font-bold text-red-700"><i class="fa fa-plus-square"></i>&nbsp;{{ $page_title }}</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route("karyawan.index") }}" class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer">
                                    <i class="fa fa-list"></i>&nbsp;&nbsp;List Karyawan
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
                            <form role="form" id="form-user" method="POST" action="{{ route('karyawan.create') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Nama Lengkap</label>
                                        <input type="text" name="full_name"
                                            class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                            placeholder="Bill..." aria-label="FullName"
                                            aria-describedby="invalidCheckFullName">
                                        @if($errors->has('full_name'))
                                        <div id="invalidCheckFullName" class="invalid-feedback">
                                            {{ $errors->first('full_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Username</label>
                                        <input type="text" name="username"
                                            class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                            placeholder="username..." aria-label="Username"
                                            aria-describedby="invalidCheckUsername">
                                        @if($errors->has('username'))
                                        <div id="invalidCheckUsername" class="invalid-feedback">
                                            {{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Email</label>
                                        <input type="text" name="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            placeholder="Bill..." aria-label="Email"
                                            aria-describedby="invalidCheckEmail">
                                        @if($errors->has('email'))
                                        <div id="invalidCheckEmail" class="invalid-feedback">
                                            {{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">No Telepon</label>
                                        <input type="text" name="phone_no"
                                            class="form-control {{ $errors->has('phone_no') ? 'is-invalid' : '' }}"
                                            placeholder="0821..." aria-label="Email"
                                            aria-describedby="invalidCheckPhoneNo">
                                        @if($errors->has('phone_no'))
                                        <div id="invalidCheckPhoneNo" class="invalid-feedback">
                                            {{ $errors->first('phone_no') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Password</label>
                                        <input type="password" name="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="Password"
                                            aria-describedby="invalidCheckPassword">
                                        @if($errors->has('password'))
                                        <div id="invalidCheckPassword" class="invalid-feedback">
                                            {{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Konfirmasi Password</label>
                                        <input type="password" name="confirm_password"
                                            class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="ConfirmPassword"
                                            aria-describedby="invalidCheckConfirmPassword">
                                        @if($errors->has('confirm_password'))
                                        <div id="invalidCheckConfirmPassword" class="invalid-feedback">
                                            {{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Foto</label>
                                        <div class="flex justify-center">
                                            <img class="form-control mb-2 visually-hidden h-96 w-auto" id="img_photo" src="#" alt="" />
                                        </div>
                                        <input type="file" name="photo"
                                            class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                            placeholder="Photo" aria-label="Photo"
                                            data-img_element="img_photo"
                                            aria-describedby="invalidCheckPhoto">
                                        @if($errors->has('photo'))
                                        <div id="invalidCheckPhoto" class="invalid-feedback">
                                            {{ $errors->first('photo') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Kartu Identitas (KTP/SIM)</label>
                                        <div class="flex justify-center">
                                            <img class="form-control mb-2 visually-hidden h-96 w-auto" id="img_identity_card" src="#" alt="" />
                                        </div>
                                        <input type="file" name="identity_card"
                                            class="form-control {{ $errors->has('identity_card') ? 'is-invalid' : '' }}"
                                            data-img_element="img_identity_card"
                                            placeholder="Photo" aria-label="IdentityCard"
                                            aria-describedby="invalidCheckIdentityCard">
                                        @if($errors->has('identity_card'))
                                        <div id="invalidCheckIdentityCard" class="invalid-feedback">
                                            {{ $errors->first('identity_card') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Salary</label>
                                        <input type="text" name="salary"
                                            class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="Salary"
                                            aria-describedby="invalidCheckSalary">
                                        @if($errors->has('salary'))
                                        <div id="invalidCheckSalary" class="invalid-feedback">
                                            {{ $errors->first('salary') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label class="form-label text-red-800 font-semibold text-base">Tanggal Bergabung</label>
                                        <input type="date" name="joined_since"
                                            class="form-control {{ $errors->has('joined_since') ? 'is-invalid' : '' }}"
                                            placeholder="" aria-label="JoinedSince"
                                            aria-describedby="invalidCheckJoinedSince">
                                        @if($errors->has('joined_since'))
                                        <div id="invalidCheckJoinedSince" class="invalid-feedback">
                                            {{ $errors->first('joined_since') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="font-bold text-red-800 w-max px-3 py-2 border-2 border-red-700 rounded-lg mt-2 hover:bg-red-900 hover:text-white cursor-pointer"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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