@extends('app.layouts.index')

@section('content')
<section class="py-10 d-flex items-center bg-light-2">
    <div class="container">
        <div class="row y-gap-10 items-center justify-between">
            <div class="col-auto">
                <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                    <div class="col-auto">Beranda</div>
                    <div class="col-auto">></div>
                    <div class="col-auto">Galeri</div>
                    <div class="col-auto">></div>
                    <div class="col-auto">{{ $galeri->judul }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Section Gambar Utama --}}
<section class="pt-40">
    <div class="container">
        <div class="relative d-flex justify-center js-section-slider"
             data-gap="10" data-slider-cols="xl-2 lg-2 base-1"
             data-nav-prev="js-img-prev" data-nav-next="js-img-next" data-loop>

            <div class="swiper-wrapper">
                @foreach($galeri->imageGaleri->take(10) as $img)
                    <div class="swiper-slide">
                        <div class="ratio ratio-64:45">
                            <img src="{{ asset($img->image_url) }}" alt="image" class="rounded-4 img-ratio">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="absolute h-full col-11">
                <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-prev">
                    <i class="icon icon-chevron-left text-12"></i>
                </button>
                <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-next">
                    <i class="icon icon-chevron-right text-12"></i>
                </button>
            </div>

            <div class="absolute h-full col-12 px-20 py-20 d-flex justify-end items-end">
                {{-- Thumbnail --}}
                <a href="{{ asset($galeri->thumbnail) }}" class="button -blue-1 px-24 py-15 bg-white text-dark-1 z-2 js-gallery" data-gallery="gallery2">
                    Lihat Semua Foto
                </a>

                {{-- Hidden All Image for Gallery --}}
                @foreach($galeri->imageGaleri as $img)
                    <a href="{{ asset($img->image_url) }}" class="js-gallery" data-gallery="gallery2"></a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Section Detail --}}
<section class="pt-40">
    <div class="container">
        <div class="row y-gap-30">
            <div class="col-lg-8">
                <div class="row justify-between items-end">
                    <div class="col-auto">
                        <h1 class="text-26 fw-600">{{ $galeri->judul }}</h1>

                        <div class="row x-gap-10 y-gap-20 items-center pt-10">
                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <i class="icon-star text-10 text-yellow-1"></i>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex x-gap-5 items-center">
                                    <i class="icon-location-2 text-16 text-light-1"></i>
                                    <div class="text-15 text-light-1">{{ $galeri->slug }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="row x-gap-10 y-gap-10">
                            <div class="col-auto">
                                <button class="button px-15 py-10 -blue-1" onclick="navigator.share({ title: document.title, url: window.location.href })">
                                    <i class="icon-share mr-10"></i> Bagikan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-top-light mt-40 mb-40"></div>

                <div class="row x-gap-40 y-gap-40">
                    <div class="col-12">
                        <h3 class="text-22 fw-500">Apa Cerita Mereka?</h3>

                        <div class="show-more -h-60 js-show-more">
                            <div class="show-more__content mt-20">
                                {!! $galeri->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Future Sidebar --}}
            {{-- <div class="col-lg-4"> ... </div> --}}
        </div>
    </div>
</section>
<br>
@endsection
