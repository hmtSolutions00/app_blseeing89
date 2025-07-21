@extends('panel.layout.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
    <style>
        .form-check-label {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border: 1px solid #ced4da;
            border-radius: .375rem;
        }

        .select2-container--bootstrap-5 .select2-selection--multiple {
            min-height: calc(1.5em + .75rem + 2px);
            border: 1px solid #ced4da;
            border-radius: .375rem;
            padding: .375rem .75rem;
            display: flex;
            /* Helps align tags */
            flex-wrap: wrap;
            /* Allows tags to wrap */
            align-items: center;
            /* Vertically centers tags */
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice {
            background-color: #e9ecef;
            border: 1px solid #dee2e6;
            border-radius: .2rem;
            padding: .2rem .5rem;
            margin: .25rem;
            font-size: .875em;
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove {
            margin-left: .5rem;
            color: #6c757d;
        }

        .select2-container--bootstrap-5.select2-container--focus .select2-selection--multiple,
        .select2-container--bootstrap-5.select2-container--open .select2-selection--multiple {
            border-color: #86b7fe;
            /* Bootstrap focus color */
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
        }
    </style>

    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-30 lg:pb-40 md:pb-32">
                <div class="col-12">
                    <h1 class="text-30 lh-14 fw-600">Tambah Video Promosi</h1>
                    <div class="text-15 text-light-1">Tambah Video Promosi Blessing89 Tour & travel</div>
                </div>
            </div>
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <form class="forms-sample" action="{{ route('admin-panel.promotional_video.store') }}"
                            enctype="multipart/form-data" method="POST" id="form-promotional-video">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="path_video" class="mb-2">File Video Promosi</label>
                                    <input type="file" id="path_video" name="path_video"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Deluxe, dll" value="{{ old('path_video') }}">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="is_show" class="mb-2">Status Tampil Video</label><br>
                                    <select class="form-control form-control-lg h-50" name="is_show" id="is_show">
                                        <option value="" disabled selected>-- Pilih Status Tampil Video --</option>
                                        <option value="1">Tampil</option>
                                        <option value="0">Tidak Tampil</option>

                                    </select>
                                </div>
                            </div>
                                <button type="button" class="btn btn-primary me-2"
                                    onclick="addConfirmation()">Tambahkan</button>
                                <a href="{{ route('admin-panel.promotional_video.index') }}" class="btn btn-light">Batalkan</a>
                        </form>
                    </div>
                </div>
            </div>
            @include('panel.component.footer')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function addConfirmation() {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menambahkan data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-promotional-video').submit();
                }
            });
        }
    </script>
@endsection
