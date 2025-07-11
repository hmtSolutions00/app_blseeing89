@extends('app.layouts.index')
@push('dynamic_tag')
    <title>{{ $carousel->judul }} | Blessing89 Tour Travel</title>
    <meta name="description" content="{{ $carousel->meta_description }}">
    <meta name="keywords" content="{{ $carousel->meta_keywords }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $carousel->meta_og_title }} | Blessing89 Tour Travel">
    <meta property="og:description" content="{{ $carousel->meta_og_description }}">
   <meta property="og:image" content="{{ asset('carousel-images/' . $carousel->thumbnail) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{$carousel->meta_og_type}}">
    <meta property="og:site_name" content="Blessing89 Tour Travel">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Blessing89Travel">
    <meta name="twitter:title" content="{{ $carousel->meta_og_title }}| Blessing89 Tour Travel">
    <meta name="twitter:description" content="{{ $carousel->meta_og_description }}">
    <meta name="twitter:image" content="{{ asset('carousel-images/' . $carousel->thumbnail) }}">
@endpush
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endpush
@section('content')
    <section class="py-10 d-flex items-center bg-light-2">
        <div class="container">
            <div class="row y-gap-10 items-center justify-between">
                <div class="col-auto">
                    <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                        <div class="col-auto">
                            <div class="">Beranda</div>
                        </div>
                        <div class="col-auto">
                            <div class="">></div>
                        </div>
                        <div class="col-auto">
                            <div class="">Carousel</div>
                        </div>
                        <div class="col-auto">
                            <div class="">></div>
                        </div>
                        <div class="col-auto">
                            <div class="text-dark-1">{{ $carousel->judul }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-anim="slide-up" class="layout-pt-md">
        <div class="container">
            <div class="row y-gap-40 justify-center text-center">
                <div class="col-12">
                    {{-- <div class="text-15 fw-500 text-blue-1 mb-8">Adventure travel</div> --}}
                    <h1 class="text-30 fw-600">{{ $carousel->judul }}</h1>
                    <div class="text-15 text-light-1 mt-10">
                        {{ \Carbon\Carbon::parse($carousel->created_at)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="col-10">
                    <img src="/carousel-images/{{ $carousel->url_images }}" alt="image" class="col-12 rounded-8">
                </div>
            </div>
        </div>
    </section>

    <section data-anim="slide-up" class="layout-pt-md">
        <div class="container">
            <div class="row y-gap-30 justify-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="">
                        <h3 class="text-20 fw-500">Deskripsi</h3>
                        <div class="text-15 mt-20">{!! $carousel->deskripsi !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title">Produk Terkait</h2>
                        <p class=" sectionTitle__text mt-5 sm:mt-0">Produk terkait dengan Carousel!</p>
                    </div>
                </div>

                @if (count($related_products) != 0)
                    <div class="row y-gap-30 pt-30">
                        @foreach ($related_products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <a href="{{ route('frontend.products.show', [$product->slug_category, $product->slug_sub, $product->slug]) }}" class="blogCard -type-2 d-block bg-white rounded-4 shadow-4">
                                    {{-- redirect ke detail product di halaman pemesan --}}
                                    <div class="blogCard__image">
                                        <div class="ratio ratio-1:1 rounded-4">
                                            <img class="img-ratio js-lazy" src="#"
                                                data-src="/{{ $product->thumbnail }}" alt="image">
                                        </div>
                                    </div>
                                    <div class="px-10 py-10" style="text-align: left">
                                        <h6 class="text-dark-1 text-16 text-wrap fw-600">
                                            {{ $product->name }}</h6>
                                        <h6 class="text-light-1 text-13 text-wrap">
                                            {{ Str::words($product->description, 25, '...') }}
                                            @if (Str::wordCount($product->description) > 25)
                                                <b class="text-blue-1 fw-550">Baca Selengkapnya</b>
                                            @endif
                                        </h6>
                                        <h6 class="text-blue-1 text-12 text-wrap">
                                            <i class="fa-solid fa-hashtag"></i>{{ $product->category_name }}
                                            <i class="fa-solid fa-hashtag"></i>{{ $product->subcategory_name }}
                                        </h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-10 py-10">
                        <h6 class="text-secondary text-11 text-wrap" style="font-style: italic">
                            Tidak ada produk terkait dengan carousel ini.</h6>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const mastheadImageCarousel = new Swiper('#mastheadImageCarouselOnly', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            speed: 600,
            slidesPerView: 1,
            effect: 'slide', // efek geser ke samping
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection
