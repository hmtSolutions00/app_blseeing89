@extends('app.layouts.index')
@section('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        @media (max-width: 576px) {
            .product-category-card {
                padding: 10px;
            }

            .product-category-card .category-title {
                font-size: 12px;
                line-height: 14px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .product-category-card .category-count {
                font-size: 10px;
            }

            .product-category-card img {
                max-height: 60px;
                object-fit: cover;
            }
        }

        .product-category-scroll {
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            padding-bottom: 10px;
        }

        .category-grid {
            display: grid;
            grid-auto-flow: column;
            grid-template-rows: repeat(2, 1fr);
            /* 2 baris
                              grid-template-rows: repeat(3, 1fr); /* jadi 3 baris */
            */ gap: 10px;
            width: max-content;
        }

        .category-card {
            width: 120px;
        }

        .category-card {
            width: 120px;
            padding: 10px;
            background-color: #ffffff;
            border: 2px solid #ffcc00;
            /* warna kuning keemasan */
            border-radius: 12px;
            margin: 4px;
            box-sizing: border-box;
            transition: transform 0.2s ease;
        }

        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .category-card .text-14 {
            height: 42px;
            /* batasi tinggi (misal 2 baris teks) */
            overflow-y: auto;
            font-size: 14px;
            line-height: 1.2;
        }
    </style>
@endsection
@section('content')
    {{-- Kategori Produk dan layanan kami --}}
    @include('app.pages.index.categories')
    {{-- End Kategori Produk dan kayanan kami --}}
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="tabs -pills-2 js-tabs">
                <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
                    <div class="col-12">
                        <div class="sectionTitle -md">
                            <h2 class="sectionTitle__title">Video Promosi Produk</h2>
                            <p class="sectionTitle__text mt-5 sm:mt-0">Temukan Video tentang Produk Terbaru Kami Disini</p>
                        </div>
                    </div>

                    {{-- Tabs Subkategori --}}
                    @foreach ($promoVideos as $video)
                        <div class="col-12 col-lg-6 text-center">
                            <video controls style="max-height: 500px;min-height: 500px;">
                                <source src="/assets/video/{{ $video->path_video }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                    {{-- <div class="col-12 col-lg-6 text-center">
                        <video controls style="max-height: 500px;min-height: 500px;">
                            <source src="{{ asset('/assets/video/video_promosi.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    @include('app.pages.index.products')

    <section class="layout-pt-lg layout-pb-lg bg-dark-3" id="testimonial_section">
        <div class="container">
            <div class="row y-gap-60">
                <div class="col-xl-5 col-lg-6" style="align-content: center">
                    <h2 class="text-30 text-white">Perjalanan Mereka,Inspirasi Anda.<br>Dipercaya oleh Ratusan Traveler.
                    </h2>
                    <p class="text-white mt-20">Kisah nyata dari para traveler yang telah menjelajahi dunia bersama
                        Blessing89 Tour & Travel.
                        Lihat bagaimana kami membantu menciptakan momen tak terlupakan di berbagai destinasi impian.</p>
                </div>

                <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-10">


                    <div class="testimonials-slider-2 js-testimonials-slider-2">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40 shadow-2">
                                        <div class="">
                                            {{-- <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4> --}}
                                            <p class="testimonials__text lh-18 fw-500 text-dark-1">
                                                &quot;{{ $testimonial->testimonial_text }}&quot;</p>
                                            <div class="pt-20 mt-28 border-top-light">
                                                <div class="row x-gap-20 y-gap-20 items-center">
                                                    <div class="col-3">
                                                        <img src="/uploads/testimonial/{{ $testimonial->customer_photo_path }}"
                                                            alt="image"
                                                            style="border-radius: 60%; width: 80px;height:65px; object-fit: cover;">
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="text-15 fw-500 lh-14">{{ $testimonial->customer_name }}
                                                        </div>
                                                        {{-- <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                        <div class="d-flex x-gap-15 items-center justify-center pt-30">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover text-white js-prev">
                                    <i class="icon icon-arrow-left"></i>
                                </button>
                            </div>

                            <div class="col-auto">
                                <div class="pagination -dots text-white-50 js-pagination"></div>
                            </div>

                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover text-white js-next">
                                    <i class="icon icon-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row justify-center text-center pt-60">
                <div class="col-auto">
                    <div class="text-20 lh-1 text-white">Partner Kami</div>
                </div>
            </div>

            <div class="px-40 md:px-0" style="justify-items: anchor-center;">
                <div class="row y-gap-30 items-center pt-60 lg:pt-40">
                    @foreach ($partners as $partner)
                        <div class="col-md-auto col-sm-6">
                            <div class="d-flex justify-center">
                                <img src="/uploads/partner/{{ $partner->logo_path }}" alt="image" style="width:100px">
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

    {{-- Galeri List --}}
    <section class="layout-pt-lg layout-pb-md">
        <div data-anim-wrap class="container">
            <div data-anim-child="slide-up delay-1" class="row">
                <div class="col-auto">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title">Momen Tak Terlupakan</h2>
                        <p class=" sectionTitle__text mt-5 sm:mt-0">
                            Lihat kebahagiaan para traveler yang telah menjelajahi dunia bersama Blessing89 Tour Travel
                        </p>
                    </div>
                </div>
            </div>

            <div class="row y-gap-30 pt-40">
                @foreach ($galeriList as $index => $galeri)
                    <div data-anim-child="slide-up delay-{{ $index + 3 }}" class="col-lg-3 col-sm-6">
                        {{-- Link ke halaman galeri show --}}
                        <a href="/{{ $galeri->path_items }}" class="blogCard -type-1 d-block">
                            <div class="blogCard__image">
                                <div class="rounded-4 rounded-8 text-center">
                                    @if ($galeri->jenis_items == 'Gambar')
                                        <img class="js-lazy" src="{{ asset($galeri->path_items) }}"
                                            data-src="{{ asset($galeri->path_items) }}"
                                            style="max-height: 300px;min-height: 300px;">
                                    @else
                                        <video class="js-lazy" controls
                                            style="max-height: 300px;min-height: 300px;width: -webkit-fill-available;">
                                            <source src="{{ $galeri->path_items }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @if ($allGaleri > 3)
                    <div data-anim-child="slide-up delay-{{ $index + 3 }}" class="col-lg-3 col-sm-6">
                        {{-- Link ke halaman galeri show --}}
                        @php
                            $jlhSisa = $allGaleri - 3;
                        @endphp
                        <a href="{{ route('galeri.list') }}" class="blogCard -type-1 d-block">
                            <div class="blogCard__image">
                                <div
                                    class="rounded-4 rounded-8 text-center bg-light-2"style="height:300px;align-content:center">
                                    <h3 class="text-dark-3">Lihat Lainnya...{{ $jlhSisa }}+</h3>
                                </div>
                            </div>
                        </a>
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
