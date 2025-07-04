@extends('panel.layout.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-30 lg:pb-40 md:pb-32">
                <div class="col-12">
                    <h1 class="text-30 lh-14 fw-600">Ubah Carousel</h1>
                    <div class="text-15 text-light-1">Ubah Carousel Blessing89 Tour & travel</div>
                </div>
            </div>
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <form class="forms-sample" action="{{ route('admin-panel.carousel.update', $carousel->id) }}"
                            enctype="multipart/form-data" method="POST" id="form-carousel">
                            @csrf
                            @method('PUT')
                            <div class="row mb-5">
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="judul" class="mb-2">Judul Carousel</label>
                                    <input type="text" id="judul" name="judul"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Tour Sumatera" value="{{ $carousel->judul }}">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="thumbnail" class="mb-2">Thumbnail Carousel</label>
                                    <input type="file" id="thumbnail" name="thumbnail"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Deluxe, dll" value="{{ old('thumbnail') }}">
                                    <span class="fw-700">File Gambar Carousel :</span> <a
                                        href="/carousel-images/{{ $carousel->thumbnail }}">Link Thumbnail Carousel</a>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="url_images" class="mb-2">Gambar Carousel</label>
                                    <input type="file" id="url_images" name="url_images"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Deluxe, dll" value="{{ old('url_images') }}">
                                    <span class="fw-700">File Gambar Carousel :</span> <a
                                        href="/carousel-images/{{ $carousel->url_images }}">Link gambar Carousel</a>
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="url_images" class="mb-2">Deskripsi Carousel</label>
                                    <textarea class="form-control form-control-md" name="deskripsi" id="deskripsi" rows="3">{{ $carousel->deskripsi }}</textarea>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_description" class="mb-2">Meta Description</label>
                                    <input type="text" id="meta_description" name="meta_description"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_description }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_keywords" class="mb-2">Meta Keyword</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_keywords }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_title" class="mb-2">Meta OG Title</label>
                                    <input type="text" id="meta_og_title" name="meta_og_title"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_og_title }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_description" class="mb-2">Meta OG Description</label>
                                    <input type="text" id="meta_og_description" name="meta_og_description"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_og_description }}">
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_type" class="mb-2">Meta OG Type</label>
                                    <input type="text" id="meta_og_type" name="meta_og_type"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_og_type }}">
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="product_id" class="mb-2">Tambahkan Produk Terkait</label>
                                    <select id="product_id" name="product_id[]" class="form-control form-control-lg h-50"
                                        multiple>
                                        @foreach ($productss as $product)
                                            <option value="{{ $product->id }}"
                                                @if (in_array($product->id, $selectedProductIds)) selected @endif>
                                                {{ $product->name }} - {{ $product->category_name }} - {{ $product->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary me-2"
                                onclick="updateConfirmation()">Ubah</button>
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
        });
    </script>
@endsection
