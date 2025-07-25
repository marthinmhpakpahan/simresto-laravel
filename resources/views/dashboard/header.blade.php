@include('common.header')
<div class="flex flex-row h-screen overflow-y-hidden">
    <div class="w-max bg-primary px-2 mx-1 sm:mx-3 h-screen sm:rounded-lg sm:my-3" id="sidenav-main">
        <div class="sidenav-header justify-center">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="flex flex-col mt-3 sm:mb-6 ml-2 justify-center" href="#">
                <img class="mx-auto w-[64px] sm:w-[160px]" src="{{ asset('assets/img/logos/dimxue.png') }}" />
                <span class="font-weight-bold text-white text-2xl mt-2 mx-auto hidden sm:px-10 sm:block w-max">{{ env('APP_NAME') }}
                    Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        @include('dashboard.sidebar')
        <div class="sidenav-footer mx-3 ">
        </div>
    </div>
    <div class="w-screen position-relative border-radius-lg overflow-x-auto">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class=" text-white"
                                href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $page_title }}
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0 mt-2 visually-hidden">Dashboard</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group  visually-hidden">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
