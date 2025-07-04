@include('common.header')
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <img class="mx-auto w-[350px]" src="{{ asset('assets/img/logos/dimxue.png') }}" />
          <div class="border border-white rounded-lg col-xl-4 col-lg-5 col-md-7 mx-auto mt-4 bg-primary">
            <div class="card card-plain">
              <div class="card-header bg-primary pb-0 text-start">
                <h4 class="font-weight-bolder text-white font-mono text-2xl text-center">Sign In</h4>
                <p class="mb-0 text-white text-center">Masukkan username dan password anda untuk Login</p>
              </div>
              <div class="card-body">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                  <strong>{!!session('success')!!}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- pesan gagal -->
                @if(session()->has('failed'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{!!session('failed')!!}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- pesan error -->
                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <strong>{!!session('error')!!}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}" role="form">
                  @csrf
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"
                      aria-label="Email">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"
                      aria-label="Password">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn border border-white btn-lg btn-lg w-100 mt-4 mb-0 text-white">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/argon-dashboard.min.js?v=2.0.4"></script>