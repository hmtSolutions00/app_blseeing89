<div class="masthead__content">
    <div class="row y-gap-60">
        <div class="col-xl-5">
            <h1 data-anim-child="slide-up delay-2" class="z-2 text-60 lg:text-40 md:text-30 text-white pt-80 xl:pt-0">
                <span class="text-yellow-1">All Services for</span><br>
                Seamless Travel
                <p data-anim-child="slide-up delay-3" class="text-white">Discover The World with us</p>
            </h1>
        </div>
        {{-- Carousel --}}
        {{-- Carousel --}}
        <div class="col-xl-7">
            <div id="mastheadImageCarouselOnly" class="masthead-slider overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($carousels as $carousel)
                        <div class="swiper-slide">
                            <a href="{{ route('carousel.detail', $carousel->id) }}"><img
                                    src="carousel-images/{{ $carousel->thumbnail }}" alt="image"
                                    style="width: -webkit-fill-available;max-height:400px"></a>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>

            </div>
        </div>
        {{-- End Carousel --}}
    </div>
   <div class="row y-gap-30 justify-center items-center">
  <div class="col-auto">
   <form action="{{ route('frontend.search') }}" method="GET">
    <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
        <div>
            <input class="bg-white h-60" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari produk ">
        </div>
        <div>
            <button type="submit" class="button -md h-60 bg-blue-1 text-white">Cari Produk</button>
        </div>
    </div>
</form>
  </div>
</div>

</div>
{{-- End Carousel --}}
