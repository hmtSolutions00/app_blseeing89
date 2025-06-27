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
                    <h1 class="text-30 lh-14 fw-600">Tambah Carousel</h1>
                    <div class="text-15 text-light-1">Tambah Carousel Blessing89 Tour & travel</div>
                </div>
            </div>
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <form class="forms-sample" action="{{ route('admin-panel.carousel.store') }}"
                            enctype="multipart/form-data" method="POST" id="form-carousel">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="judul" class="mb-2">Judul Carousel</label>
                                    <input type="text" id="judul" name="judul"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Tour Sumatera" value="{{ old('judul') }}">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="url_images" class="mb-2">Gambar Carousel</label>
                                    <input type="file" id="url_images" name="url_images"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Deluxe, dll" value="{{ old('url_images') }}">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="thumbnail" class="mb-2">Thumbnail Carousel</label>
                                    <input type="file" id="thumbnail" name="thumbnail"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Deluxe, dll" value="{{ old('thumbnail') }}">
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="url_images" class="mb-2">Deskripsi Carousel</label>
                                    <textarea class="form-control form-control-md" name="deskripsi" id="deskripsi" rows="3"></textarea>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_description" class="mb-2">Meta Description</label>
                                    <input type="text" id="meta_description" name="meta_description"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Masukan ....." value="{{ old('meta_description') }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_keywords" class="mb-2">Meta Keyword</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Masukan ....." value="{{ old('meta_keywords') }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_title" class="mb-2">Meta OG Title</label>
                                    <input type="text" id="meta_og_title" name="meta_og_title"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Masukan ....." value="{{ old('meta_og_title') }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_description" class="mb-2">Meta OG Description</label>
                                    <input type="text" id="meta_og_description" name="meta_og_description"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Masukan ....." value="{{ old('meta_og_description') }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_type" class="mb-2">Meta OG Type</label> <br>
                                    <input type="text" id="meta_og_type" name="meta_og_type"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Masukan ....." value="{{ old('meta_og_type') }}">
                                </div>

                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="product_id" class="mb-2">Tambahkan Produk Terkait</label>
                                    <select id="product_id" name="product_id[]" class="form-control form-control-lg h-50"
                                        multiple>
                                        @foreach ($productss as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->category_name }} - {{ $product->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-lg-12 mb-3">
                                    <button type="button" class="btn btn-primary btn-md" id="addRelatedProductBtn">
                                        <i class="fa-solid fa-plus"></i> Tambah Produk Terkait
                                    </button>
                                </div> --}}

                                {{-- Container for category and subcategory selects --}}
                                {{-- <div id="productSelectsContainer" style="display: none;">
                                    <div class="col-lg-6 mb-3">
                                        <select name="product_category_id" id="product_category_id" required
                                            class="form-control">
                                            <option value="" disabled selected>-- Pilih Kategori Produk --</option>
                                            @foreach ($productCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <select name="product_subcategory_id" id="product_subcategory_id" required
                                            class="form-control">
                                            <option value="" disabled selected>-- Pilih Sub Kategori Produk --
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <div class="row" id="productCheckboxesContainer" style="display: none;">

                                        </div>
                                    </div> --}}
                            </div>
                    </div>
                    <button type="button" class="btn btn-primary me-2" onclick="addConfirmation()">Tambahkan</button>
                    <a href="{{ route('admin-panel.carousel.index') }}" class="btn btn-light">Batalkan</a>
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
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .catch(error => {
                console.error(error);
            });

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
                    document.getElementById('form-carousel').submit();
                }
            });
        }

        $(document).ready(function() {
            $('#product_id').select2({
                theme: 'bootstrap-5',
                selectionCssClass: "select2--large",
                dropdownCssClass: "select2--large",
                placeholder: 'Cari atau pilih hobi...',
                allowClear: true,
                closeOnSelect: true,
                tags: true,
            });

            $('#addRelatedProductBtn').on('click', function() {
                $('#productSelectsContainer').slideDown();
            });

            $('#product_category_id').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: '/admin-panel/get-subcategories/' + categoryId, // Your Laravel route
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#product_subcategory_id').empty();
                            $('#product_subcategory_id').append(
                                '<option value="" disabled selected>-- Pilih Sub Kategori Produk --</option>'
                            );
                            $.each(data, function(key, value) {
                                $('#product_subcategory_id').append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                            // Clear products when category changes
                            $('#productCheckboxesContainer').empty().hide();
                        }
                    });
                } else {
                    $('#product_subcategory_id').empty();
                    $('#product_subcategory_id').append(
                        '<option value="" disabled selected>-- Pilih Sub Kategori Produk --</option>');
                    $('#productCheckboxesContainer').empty().hide();
                }
            });

            $('#product_subcategory_id').on('change', function() {
                var subcategoryId = $(this).val();
                var categoryId = $('#product_category_id').val();

                if (subcategoryId && categoryId) {
                    $.ajax({
                        url: '/admin-panel/get-products/' + subcategoryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#productCheckboxesContainer').empty().show();
                            $('#productCheckboxesContainer').append(
                                '<label class="mb-2">Daftar Produk</label></br>'
                            );
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#productCheckboxesContainer').append(
                                        '<div class="form-check form-check-inline col-lg-12 mb-3">' +
                                        '<input class="form-check-input col-2" type="checkbox" id="product_id_' +
                                        value.id + '" name="product_id[]" value="' +
                                        value.id + '">' +
                                        '<label class="form-check-label text-wrap" for="product_id_' +
                                        value.id + '"><img src="/' + value
                                        .thumbnail +
                                        '" alt="dsaaasdf" class="col-4">' + value
                                        .name + '</label>' +
                                        '</div>'
                                    );
                                });
                            } else {
                                $('#productCheckboxesContainer').append(
                                    '<p>Tidak ada produk ditemukan untuk sub kategori ini.</p>'
                                );
                            }
                        }
                    });
                } else {
                    $('#productCheckboxesContainer').empty().hide();
                }
            });
        });
    </script>
@endsection
