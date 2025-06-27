@extends('app.layouts.index')
@section('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
@section('content')
    {{-- Kategori Produk dan layanan kami --}}
    @include('app.pages.index.categories')
    {{-- End Kategori Produk dan kayanan kami --}}
    @include('app.pages.index.products')

    <section class="layout-pt-lg layout-pb-lg bg-dark-3" id="testimonial_section">
        <div class="container">
            <div class="row y-gap-60">
                <div class="col-xl-5 col-lg-6" style="align-content: center">
                    <h2 class="text-30 text-white">What our customers are<br> saying us?</h2>
                    <p class="text-white mt-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                        varius tortor nibh, sit amet tempor nibh finibus et. Aenean eu enim justo.</p>

                    {{-- <div class="row y-gap-30 text-white pt-60 lg:pt-40">
                        <div class="col-sm-5 col-6">
                            <div class="text-30 lh-15 fw-600">13m+</div>
                            <div class="lh-15">Happy People</div>
                        </div>

                        <div class="col-sm-5 col-6">
                            <div class="text-30 lh-15 fw-600">4.88</div>
                            <div class="lh-15">Overall rating</div>

                            <div class="d-flex x-gap-5 items-center pt-10">

                                <div class="icon-star text-white text-10"></div>

                                <div class="icon-star text-white text-10"></div>

                                <div class="icon-star text-white text-10"></div>

                                <div class="icon-star text-white text-10"></div>

                                <div class="icon-star text-white text-10"></div>

                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-10">


                    <div class="testimonials-slider-2 js-testimonials-slider-2">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40 shadow-2">
                                        <div class="">
                                            {{-- <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4> --}}
                                            <p class="testimonials__text lh-18 fw-500 text-dark-1">&quot;{{ $testimonial->testimonial_text }}&quot;</p>
                                            <div class="pt-20 mt-28 border-top-light">
                                                <div class="row x-gap-20 y-gap-20 items-center">
                                                    <div class="col-3">
                                                        <img src="/uploads/testimonial/{{ $testimonial->customer_photo_path }}" alt="image" style="border-radius: 60%; width: 80px;height:65px; object-fit: cover;">
                                                    </div>

                                                    <div class="col-auto">
                                                        <div class="text-15 fw-500 lh-14">{{ $testimonial->customer_name }}</div>
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

                    {{--
                    <div class="col-md-auto col-sm-6">
                        <div class="d-flex justify-center">
                            <img src="img/clients/2.svg" alt="image">
                        </div>
                    </div>

                    <div class="col-md-auto col-sm-6">
                        <div class="d-flex justify-center">
                            <img src="img/clients/3.svg" alt="image">
                        </div>
                    </div>

                    <div class="col-md-auto col-sm-6">
                        <div class="d-flex justify-center">
                            <img src="img/clients/4.svg" alt="image">
                        </div>
                    </div>

                    <div class="col-md-auto col-sm-6">
                        <div class="d-flex justify-center">
                            <img src="img/clients/5.svg" alt="image">
                        </div>
                    </div>

                    <div class="col-md-auto col-sm-6">
                        <div class="d-flex justify-center">
                            <img src="img/clients/6.svg" alt="image">
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-md">
        <div data-anim-wrap class="container">
            <div data-anim-child="slide-up delay-1" class="row">
                <div class="col-auto">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title">Get inspiration for your next trip</h2>
                        <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames</p>
                    </div>
                </div>
            </div>

            <div class="row y-gap-30 pt-40">

                <div data-anim-child="slide-up delay-3" class="col-lg-3 col-sm-6">

                    <a href="#" class="blogCard -type-1 d-block ">
                        <div class="blogCard__image">
                            <div class="ratio ratio-1:1 rounded-4 rounded-8">
                                <img class="img-ratio js-lazy" src="#" data-src="img/blog/1.png" alt="image">
                            </div>
                        </div>

                        <div class="mt-20">
                            <h4 class="text-dark-1 text-18 fw-500">10 European ski destinations you should visit
                                this winter</h4>
                            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
                        </div>
                    </a>

                </div>

                <div data-anim-child="slide-up delay-4" class="col-lg-3 col-sm-6">

                    <a href="#" class="blogCard -type-1 d-block ">
                        <div class="blogCard__image">
                            <div class="ratio ratio-1:1 rounded-4 rounded-8">
                                <img class="img-ratio js-lazy" src="#" data-src="img/blog/2.png" alt="image">
                            </div>
                        </div>

                        <div class="mt-20">
                            <h4 class="text-dark-1 text-18 fw-500">Booking travel during Corona: good advice in an
                                uncertain time</h4>
                            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
                        </div>
                    </a>

                </div>

                <div data-anim-child="slide-up delay-5" class="col-lg-3 col-sm-6">

                    <a href="#" class="blogCard -type-1 d-block ">
                        <div class="blogCard__image">
                            <div class="ratio ratio-1:1 rounded-4 rounded-8">
                                <img class="img-ratio js-lazy" src="#" data-src="img/blog/3.png" alt="image">
                            </div>
                        </div>

                        <div class="mt-20">
                            <h4 class="text-dark-1 text-18 fw-500">Where can I go? 5 amazing countries that are
                                open right now</h4>
                            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
                        </div>
                    </a>

                </div>

                <div data-anim-child="slide-up delay-6" class="col-lg-3 col-sm-6">

                    <a href="#" class="blogCard -type-1 d-block ">
                        <div class="blogCard__image">
                            <div class="ratio ratio-1:1 rounded-4 rounded-8">
                                <img class="img-ratio js-lazy" src="#" data-src="img/blog/4.png" alt="image">
                            </div>
                        </div>

                        <div class="mt-20">
                            <h4 class="text-dark-1 text-18 fw-500">The best times & places to see the Northern
                                Lights in Iceland</h4>
                            <div class="text-light-1 text-15 lh-14 mt-5">April 06, 2022</div>
                        </div>
                    </a>

                </div>

            </div>
        </div>
    </section>


    <section data-anim="slide-up delay-1" class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row ml-0 mr-0 items-center justify-between">
                <div class="col-xl-5 px-0">
                    <img class="col-12 h-400" src="img/newsletter/1.png" alt="image">
                </div>

                <div class="col px-0">
                    <div class="d-flex justify-center flex-column h-400 px-80 py-40 md:px-30 bg-light-2">
                        <div class="icon-newsletter text-60 sm:text-40 text-dark-1"></div>
                        <h2 class="text-30 sm:text-24 lh-15 mt-20">Your Travel Journey Starts Here</h2>
                        <p class="text-dark-1 mt-5">Sign up and we'll send the best deals to you</p>

                        <div class="single-field -w-410 d-flex x-gap-10 flex-wrap y-gap-20 pt-30">
                            <div class="col-auto">
                                <input class="col-12 bg-white h-60" type="text" placeholder="Your Email">
                            </div>

                            <div class="col-auto">
                                <button class="button -md h-60 -blue-1 bg-yellow-1 text-dark-1">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section data-anim-wrap class="section-bg pt-80 pb-80 md:pt-40 md:pb-40">


        <div class="container">
            <div class="row y-gap-30 items-center justify-between">
                <div data-anim-child="slide-up delay-2" class="col-xl-5 col-lg-6">
                    <h2 class="text-30 lh-15">Download the App</h2>
                    <p class="text-dark-1 pr-40 lg:pr-0 mt-15 sm:mt-5">Book in advance or last-minute with GoTrip.
                        Receive instant confirmation. Access your booking info offline.</p>

                    <div class="row y-gap-20 items-center pt-30 sm:pt-10">
                        <div class="col-auto">
                            <div class="d-flex items-center px-20 py-10 rounded-8 border-white-15 text-white bg-dark-3">
                                <div class="icon-apple text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14">Download on the</div>
                                    <div class="text-15 lh-1 fw-500">Apple Store</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex items-center px-20 py-10 rounded-8 border-white-15 text-white bg-dark-3">
                                <div class="icon-play-market text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14">Get in on</div>
                                    <div class="text-15 lh-1 fw-500">Google Play</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-3" class="col-lg-6">
                    <img src="img/app/1.png" alt="image">
                </div>
            </div>
        </div>
    </section>


    <section class="pt-80 pb-80 bg-green-1">
        <div class="container">
            <div class="row y-gap-20 justify-between">
                <div class="col-auto">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title">Not a Member Yet?</h2>
                        <p class="text-dark-1 sectionTitle__text mt-5 sm:mt-0">Join us! Our members can access
                            savings of up to 50% and earn Trip Coins while booking.</p>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-auto">
                            <button class="button px-40 h-60 -blue-1 text-blue-1 border-blue-1">
                                Sign In
                                <i class="icon-arrow-top-right ml-10"></i>
                            </button>
                        </div>

                        <div class="col-auto">
                            <button class="button px-40 h-60 -blue-1 bg-yellow-1 text-dark-1">
                                Register
                                <i class="icon-arrow-top-right ml-10"></i>
                            </button>
                        </div>
                    </div>
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
