@extends('panel.layout.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-30 lg:pb-40 md:pb-32">
                <div class="col-12">
                    <h1 class="text-30 lh-14 fw-600">Detail Carousel</h1>
                    <div class="text-15 text-light-1">Detail Carousel Blessing89 Tour & travel</div>
                </div>
            </div>
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <form class="forms-sample" action="{{ route('admin-panel.carousel.store') }}"
                            enctype="multipart/form-data" method="POST" id="form-carousel">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="judul" class="mb-2">Judul Carousel</label>
                                    <input type="text" id="judul" name="judul"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="Contoh: Deluxe, dll" value="{{ $carousel->judul }}" readonly>
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <label for="url_images" class="mb-2">Gambar Carousel</label><br>
                                    <img src="/carousel-images/{{ $carousel->url_images }}" alt="" style="width: 400px">
                                </div>
                                <div class="col-12 col-lg-12 mb-3">
                                    <span for="url_images" class="mb-2" style="font-weight: bold">Deskripsi
                                        Carousel</span>
                                    <p>{!! $carousel->deskripsi !!}</p>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_description" class="mb-2">Meta Description</label>
                                    <input type="text" id="meta_description" name="meta_description"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_description }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_keywords" class="mb-2">Meta Keyword</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_keywords }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_title" class="mb-2">Meta OG Title</label>
                                    <input type="text" id="meta_og_title" name="meta_og_title"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_og_title }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_description" class="mb-2">Meta OG Description</label>
                                    <input type="text" id="meta_og_description" name="meta_og_description"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{ $carousel->meta_og_description }}" readonly>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="meta_og_type" class="mb-2">Meta OG Type</label>
                                    <input type="text" id="meta_og_type" name="meta_og_type"
                                        class="form-control form-control-lg h-50 @error('name') is-invalid @enderror"
                                        placeholder="-" value="{{  $carousel->meta_og_type }}" readonly>
                                </div>

                            </div>
                            <div class="col-12" style="text-align-last: right;">
                                <a href="{{ route('admin-panel.carousel.index') }}" class="btn btn-light">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('panel.component.footer')
        </div>
    </div>
@endsection
