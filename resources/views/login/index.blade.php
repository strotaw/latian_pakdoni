 @extends('be.master_auth')
 @section('login')
 <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
               <form role="form" action="{{ route('login.store') }}" id="frmlogin" method="POST" enctype="multipart/form-data" class="text-start">
                            @csrf
                             <div class="input-group input-group-outline my-3">
                                <label class="form-label">email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="button" id="btnlogin" class="btn bg-gradient-dark w-100 my-4 mb-2"  onclick="btnlogin()">Sign in</button>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                Don't have an account?
                                <a href="{{ route('register.index') }}" class="text-primary text-gradient font-weight-bold">Sign
                                    up</a>
                            </p>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

<script>
        const btnlogin = document.getElementById('btnlogin');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const form = document.getElementById('frmlogin');
        const body = document.getElementById('body');

        function simpan() {
             if (email.value === '') {
                email.focus();
                swal("Invalid Data!", "email harus diisi", "error");
            } else if (password.value === '') {
                password.focus();
                swal("Invalid Data!", "Password harus diisi", "error");
            } else {
                form.submit();
            }
        }

        btnlogin.onclick = function() {
            simpan();
        }
    </script>

@if (session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Email atau Password Salah',
        text: "{{ session('error') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif
    @endsection