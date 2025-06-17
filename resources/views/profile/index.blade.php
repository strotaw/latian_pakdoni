@extends('be.master')
@section('profile') 

  <div class="main-content position-relative max-height-vh-100 h-100">
   <!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav d-flex align-items-center justify-content-end">

                <!-- Icon Sidenav Mobile -->
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

                <!-- Notifikasi -->
                <li class="nav-item dropdown pe-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded">notifications</i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset('assets/img/team-2.jpg') }}" class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset('assets/img/small-logos/logo-spotify.svg') }}" class="avatar avatar-sm bg-gradient-dark me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                        <!-- icon svg -->
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169 -745)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716 291)">
                                                        <g transform="translate(453 454)">
                                                            <path opacity="0.6" d="M43,10.7 L43,3.6 C43,1.6 41.4,0 39.4,0 H3.6 C1.6,0 0,1.6 0,3.6 V10.7 H43 Z"/>
                                                            <path d="M0,16.1 V32.2 C0,34.2 1.6,35.8 3.6,35.8 H39.4 C41.4,35.8 43,34.2 43,32.2 V16.1 H0 Z M19.7,26.9 H7.2 V23.3 H19.7 V26.9 Z M35.8,26.9 H28.7 V23.3 H35.8 V26.9 Z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Payment successfully completed
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="dropdown">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-rounded">account_circle</i>
                            </a>
                            <ul class="d-flex align-items-center dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="userDropdown"
                                style="min-width: 200px;">
                                <li class="d-flex align-items-center gap-2 px-2 py-2">
                                    <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/img/bruce-mars.jpg') }}"
                                        alt="Profile Photo" class="avatar avatar-sm rounded-circle"
                                        style="width: 30px; height: 30px; object-fit: cover;">
                                    <form method="POST" action="{{ route('login.logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm w-100 text-start border-0 bg-transparent m-0">
                                            <span class="text-dark">Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
              </div>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

    <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask bg-gradient-dark opacity-6"></span>
            </div>
            <div class="card card-body mx-2 mx-md-2 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('be/assets/img/bruce-mars.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{ $user->role }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#information" role="tab" aria-selected="true">
                                        <i class="material-symbols-rounded text-lg position-relative">info</i>
                                        <span class="ms-1">Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#edit-profile" role="tab" aria-selected="false">
                                        <i class="material-symbols-rounded text-lg position-relative">person_edit</i>
                                        <span class="ms-1">Edit Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content">
                        <!-- Tab Information (Dipindahkan ke atas dan diubah menjadi Profile Information) -->
                        <div class="tab-pane fade show active" id="information" role="tabpanel">
                            <div class="card card-plain">
                                <div class="card-body p-3">
                                    <p class="text-sm"><strong>Profile Information</strong></p>
                                    @if (!$user->informasi && !$user->hp)
                                        <p class="text-sm mt-2">
                                            No additional information available. Please click the <strong>Edit Profile</strong> tab to add details...
                                        </p>
                                    @else
                                        <p class="text-sm mt-2">{{ $user->informasi ?? 'No additional information' }}</p>
                                    @endif
                                    <hr class="horizontal gray-light my-4">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user->name ?? 'Not available' }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $user->hp ?? 'Not available' }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user->email ?? 'Not available' }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Role:</strong> &nbsp; {{ $user->role ?? 'Not available' }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Edit Profile -->
                        <div class="tab-pane fade" id="edit-profile" role="tabpanel">
                            <div class="card card-plain">
                                <div class="card-body p-3 form-align-left">
                                    <form role="form" role="form" action="{{ route('profile.update', Auth::user()->id ?? 1) }}" method="POST" id="formEdit" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="old_password" class="form-label">Old Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your current password">
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
                                        </div>

                                        <div class="form-group">
                                            <label for="retype_password" class="form-label">Retype Password</label>
                                            <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Confirm new password">
                                        </div>

                                        <div class="form-group">
                                            <label for="informasi" class="form-label">informasi</label>
                                            <textarea class="form-control" id="informasi" name="informasi" rows="3">{{ old('informasi', $user->informasi) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="hp" class="form-label">hp Number</label>
                                            <input type="tel" class="form-control" id="hp" name="hp" value="{{ old('hp', $user->hp) }}" placeholder="Enter your phone number">
                                        </div>

                                        <div class="form-group">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select" id="role" name="role">
                                                <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
                                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="ceo/co-founder" {{ old('role', $user->role) == 'ceo/co-founder' ? 'selected' : '' }}>CEO / Co-Founder</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto" class="form-label">Profile Picture</label>
                                            <div class="file-input-wrapper">
                                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Gambar" />
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" id="btnEdit" class="btn-update">Update Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <footer class="footer py-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
  </div>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Great, Account Created!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif



    <script>
        const btnEdit = document.getElementById('btnEdit');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const form = document.getElementById('frmEdit');
        const body = document.getElementById('body');
        const name = document.getElementById('name');
        const hp = document.getElementById('hp');
        const role = document.getElementById('role');
        const informasi = document.getElementById('informasi');
        const foto = document.getElementById('foto');

        function simpan() {
            if (name.value === '') {
                name.focus();
                swal("Invalid Data!", "Name must be filled in !", "error");
             else if (email.value === '') {
                email.focus();
                swal("Invalid Data!", "Email must be filled in !", "error");
            } else if (password.value === '') {
                password.focus();
                swal("Invalid Data!", "Password must be filled in !", "error");
            } else if (hp.value === '') {
                hp.focus();
                swal("Invalid Data!", "hp Number harus diisi dengan benar !", "error");
            } else if (role.value === '') {
                role.focus();
                swal("Invalid Data!", "Role harus diisi", "error");
            } else if (foto.files.length > 0 && !foto.files[0].type.startsWith('image/')) {
                foto.focus();
                swal("Invalid Data!", "Foto harus berupa gambar", "error");
            } else if (informasi.value === '') {
                informasi.focus();
                swal("Invalid Data!", "Informasi harus diisi", "error");
            } else {
                form.submit();
            }

        }
        }

        btnEdit.onclick = function() {
            simpan();
        }
    </script>
@if (session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Great, Account Edited!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

@if (session('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Great, Account Edited!',
        text: "{{ session('error') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif
@endsection