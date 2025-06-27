@extends('panel.layout.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .form-check-label {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        input {
            border: solid 1px;
            border-color: thistle;
        }

        .form-control.form-control-lg {
            border: solid 1px thistle !important;
        }

        textarea {
            width: 100%;
            /* Minimal tinggi saat kosong */
            min-height: 50px;
            /* Opsional: hindari scrollbar horizontal */
            overflow-x: hidden;
            /* Opsional: nonaktifkan resize manual oleh user */
            resize: none;
            /* Untuk transisi halus saat resize */
            transition: height 0.2s ease-in-out;
            box-sizing: border-box;
            /* Penting agar padding dan border tidak menambah lebar/tinggi */
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
                    <h1 class="text-30 lh-14 fw-600">Kelola About Us</h1>
                    <div class="text-15 text-light-1">Kelola Carousel Blessing89 Tour & travel</div>
                </div>
            </div>
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <section class="layout-pt-md">
                    <div class="container" style="width: fit-content;">
                        <form class="forms-sample" action="{{ route('admin-panel.about-us.update', $about_us->id) }}"
                            enctype="multipart/form-data" method="POST" id="form-about-us">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="row y-gap-30 justify-between items-center">
                                    <div class="col-lg-5">
                                        <h2 class="text-30 fw-600">About Blessing89</h2>
                                        <p><input class="text-secondary" type="text" name="title" id="title"
                                                value="{{ $about_us->title }}" style=""></p>

                                        <p class="text-dark-1 mt-30">
                                        <div id="viewDesc" style="display: initial">{!! $about_us->description !!}</div>
                                        <textarea name="description" id="description" style="display: none">{!! $about_us->description !!}</textarea>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="/uploads/about_us/{{ $about_us->image_path }}" alt="image"
                                            class="rounded-4" style="width: -webkit-fill-available;">
                                        <input type="file" name="image_path" id="image_path"
                                            class="mt-10 form-control form-control-md" style="display: none">
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="btnUbah" class="btn btn-primary me-2 mt-3"
                                onclick="ubahAboutUs()">Ubah About Us</button>
                            <button type="button" id="btnUpdate" class="btn btn-warning me-2 mt-3"
                                onclick="updateConfirmation()" style="display: none">Simpan</button>
                            <button type="button" id="btnBatal" class="btn btn-secondary me-2 mt-3"
                                onclick="batalAboutUs()" style="display: none">Batal</button>
                        </form>
                    </div>
                </section>
            </div>
            @include('panel.component.footer')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js') }}"></script>

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
                    document.getElementById('form-about-us').submit();
                }
            });
        }
        let editorInstance;

        function ubahAboutUs() {
            const titleInput = document.getElementById('title');
            const descriptionTextarea = document.getElementById('description');
            const description = document.getElementById('viewDesc');

            titleInput.classList.add('form-control');
            titleInput.classList.add('form-control-lg');
            descriptionTextarea.classList.add('form-control');
            descriptionTextarea.classList.add('form-control-lg');
            description.style.display = 'none';

            if (!editorInstance) {
                ClassicEditor
                    .create(descriptionTextarea, {})
                    .then(editor => {
                        editorInstance = editor;

                    });
            }
            $('#btnUpdate').show();
            $('#btnBatal').show();
            $('#description').show();
            $('#btnUbah').hide();
            $('#image_path').show();
        }

        function batalAboutUs() {
            const titleInput = document.getElementById('title');
            const descriptionTextarea = document.getElementById('description');
            const image = document.getElementById('image_path');

            titleInput.classList.remove('form-control');
            titleInput.classList.remove('form-control-lg');

            if (editorInstance) {
                editorInstance.destroy()
                    .then(() => {
                        editorInstance = null;
                        console.log('CKEditor instance destroyed.');

                        descriptionTextarea.classList.remove('form-control');
                        descriptionTextarea.classList.remove('form-control-lg');

                        descriptionTextarea.style.display = 'none';
                        descriptionTextarea.style.visibility = '';

                        image.style.display = 'none';

                        descriptionTextarea.style.border = 'none';
                        descriptionTextarea.style.background = 'none';
                        descriptionTextarea.style.resize = 'none';
                        descriptionTextarea.style.overflow = 'hidden';

                        autoResizeTextarea(descriptionTextarea);
                    });
            } else {
                descriptionTextarea.classList.remove('form-control');
                descriptionTextarea.classList.remove('form-control-lg');
                descriptionTextarea.style.border = 'none';
                descriptionTextarea.style.background = 'none';
                descriptionTextarea.style.resize = 'none';
                descriptionTextarea.style.overflow = 'hidden';
                autoResizeTextarea(descriptionTextarea);
            }

            $('#btnUpdate').hide();
            $('#btnBatal').hide();
            $('#btnUbah').show();
            $('#viewDesc').show();
        }

        function autoResizeTextarea(element) {
            if (element) {
                element.style.height = 'auto';
                element.style.height = (element.scrollHeight) + 'px';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const descriptionTextarea = document.getElementById('description');
            autoResizeTextarea(descriptionTextarea);
        });
    </script>
@endsection
