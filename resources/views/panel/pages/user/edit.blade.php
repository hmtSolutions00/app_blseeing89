@extends('panel.layout.admin')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
    <style>
        .password-toggle-container {
            position: relative;
            width: 100%;
            /* Atau sesuaikan dengan lebar input Anda */
            margin-bottom: 15px;
            /* Tambahkan sedikit jarak antar container jika diperlukan */
        }

        .password-toggle-container .form-control {
            padding-right: 40px;
            /* Memberi ruang untuk ikon */
        }

        .password-toggle-icon {
            position: absolute;
            right: 10px;
            /* Sesuaikan posisi horizontal */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            /* Warna ikon */
        }

        .password-toggle-icon svg {
            display: block;
            /* Pastikan SVG tidak memiliki margin ekstra */
        }
    </style>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Tidak Berhasil',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-30 lg:pb-40 md:pb-32">
                <div class="col-12">
                    <h1 class="text-30 lh-14 fw-600">Ubah Pengguna</h1>
                    <div class="text-15 text-light-1">Ubah Pengguna Blessing89 Tour & travel</div>
                </div>
            </div>
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <form class="forms-sample" action="{{ route('admin-panel.user.update', $user->id) }}"
                            enctype="multipart/form-data" method="POST" id="form-user">
                            @csrf
                            @method('PUT')
                            <div class="row mb-5">
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="name" class="mb-2">Nama Pengguna</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Admin" value="{{ $user->name }}">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: admin@gmail.com" value="{{ $user->email }}">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="password" class="mb-2">Password</label>
                                    <div class="password-toggle-container">
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                            placeholder="Masukkan Password Baru" value="{{ old('password') }}">
                                        <span class="password-toggle-icon" onclick="togglePasswordVisibility('password')">
                                            <svg id="eye-open-password" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" width="18px" height="24px"
                                                style="display: block;">
                                                <path
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zM12 9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                            </svg>
                                            <svg id="eye-closed-password" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" width="18px" height="24px"
                                                style="display: none;">
                                                <path
                                                    d="M12 4.5c-4.71 0-8.99 3.06-11 7.5 2.01 4.44 6.29 7.5 11 7.5 4.71 0 8.99-3.06 11-7.5-2.01-4.44-6.29-7.5-11-7.5zm0 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0-4.5c-.88 0-1.76.15-2.58.42l-2.06-2.06C5.51 5.09 3.88 4.5 2 4.5L12 17.5 22 4.5c-1.88 0-3.51.59-4.36 1.54l-2.06 2.06c-.82-.27-1.7-.42-2.58-.42zM4.12 12.33l-2.06-2.06c-.27.82-.42 1.7-.42 2.58 0 1.9.59 3.51 1.54 4.36l2.06-2.06c-.82-.27-1.7-.42-2.58-.42z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="konfirmasi_password" class="mb-2">Konfirmasi Password</label>
                                    <div class="password-toggle-container">
                                        <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                                            class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                            placeholder="Masukkan konfirmasi password baru"
                                            value="{{ old('konfirmasi_password') }}">
                                        <span class="password-toggle-icon"
                                            onclick="togglePasswordVisibility('konfirmasi_password')">
                                            <svg id="eye-open-konfirmasi_password" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" width="18px" height="24px"
                                                style="display: block;">
                                                <path
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zM12 9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                            </svg>
                                            <svg id="eye-closed-konfirmasi_password" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" width="18px" height="24px"
                                                style="display: none;">
                                                <path
                                                    d="M12 4.5c-4.71 0-8.99 3.06-11 7.5 2.01 4.44 6.29 7.5 11 7.5 4.71 0 8.99-3.06 11-7.5-2.01-4.44-6.29-7.5-11-7.5zm0 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0-4.5c-.88 0-1.76.15-2.58.42l-2.06-2.06C5.51 5.09 3.88 4.5 2 4.5L12 17.5 22 4.5c-1.88 0-3.51.59-4.36 1.54l-2.06 2.06c-.82-.27-1.7-.42-2.58-.42zM4.12 12.33l-2.06-2.06c-.27.82-.42 1.7-.42 2.58 0 1.9.59 3.51 1.54 4.36l2.06-2.06c-.82-.27-1.7-.42-2.58-.42z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <span class="text-danger" style="font-size:smaller">
                                        *Notes: <br>
                                        Kosongkan kolom Password dan Konfirmasi Password jika tidak ingin mengubah password!
                                    </span>

                                </div>
                            </div>

                            <button type="button" class="btn btn-primary me-2" onclick="updateConfirmation()">Ubah</button>
                            <a href="{{ route('admin-panel.user.index') }}" class="btn btn-light">Batalkan</a>
                        </form>
                    </div>
                </div>
            </div>
            @include('panel.component.footer')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function updateConfirmation() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengubah data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-user').submit();
                }
            });
        }

        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeOpenIcon = document.getElementById('eye-open-' + inputId);
            const eyeClosedIcon = document.getElementById('eye-closed-' + inputId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpenIcon.style.display = 'none';
                eyeClosedIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeOpenIcon.style.display = 'block';
                eyeClosedIcon.style.display = 'none';
            }
        }
    </script>
@endsection
