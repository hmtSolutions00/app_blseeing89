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

    <section class="pt-40">
        <div class="container">
            <div class="row y-gap-20 justify-between items-end">
                <div class="col-auto">
                    <div class="row x-gap-20  items-center">
                        <div class="col-auto">
                            <h1 class="text-30 sm:text-25 fw-600">{{ $carousel->judul }}</h1>
                        </div>
                    </div>

                    <div class="row x-gap-20 y-gap-20 items-center">
                        <div class="col-auto">
                            <div class="d-flex items-center text-15 text-light-1">
                                <small><i class="fa-solid fa-clock"> </i>
                                 Dibuat tanggal :  {{ \Carbon\Carbon::parse($carousel->created_at)->translatedFormat('d F Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-30 pb-30" style="text-align: -webkit-center;">
                <div class="col-7 relative d-flex">
                    <img src="/carousel-images/{{ $carousel->url_images }}" alt="images" class="rounded-4" style="width: -webkit-fill-available; max-height: 400px;">
                </div>
            </div>
        </div>
    </section>

    <section class="pt-30 pb-30">
      <div class="container">
        <div class="row y-gap-30">
          <div class="col-xl-12">
            <div class="row y-gap-40">
                <div id="overview" class="col-12">
                <h3 class="text-22 fw-500 pt-40 border-top-light">Deskripsi</h3>
                <p class="text-dark-1 text-15 mt-20">
                    {!! $carousel->deskripsi !!}
                </p>
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
