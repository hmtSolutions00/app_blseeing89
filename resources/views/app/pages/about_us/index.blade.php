@extends('app.layouts.index')
@section('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
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
                            <div class="">About Us</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md pb-60">
        <div class="container">
            <div class="row y-gap-30 justify-between">
                <div class="col-lg-5">
                    <img src="/uploads/about_us/{{ $about_us->image_path }}" alt="image" class="rounded-4"
                        style="width: -webkit-fill-available;">
                </div>
                <div class="col-lg-7">
                    <h2 class="text-30 fw-600">Blessing89 Tour Travel</h2>
                    <p class="mt-5">{{ $about_us->title }}</p>

                    <p class="text-dark-1 mt-40 lg:mt-40 md:mt-20">
                        {!! $about_us->description !!}
                    </p>
                </div>
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
