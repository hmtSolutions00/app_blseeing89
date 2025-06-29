<div class="masthead__content">
    <div class="row y-gap-60">
        <div class="col-xl-5">
            <h1 data-anim-child="slide-up delay-2" class="z-2 text-60 lg:text-40 md:text-30 text-white pt-80 xl:pt-0">
                <span class="text-yellow-1">All Services for</span><br>
              Seamless Travel
                <p data-anim-child="slide-up delay-3" class="text-white">Discover a World of Possibilities with Us</p>
            </h1>
        </div>
        {{-- Carousel --}}
        <div class="col-xl-7">
            <div id="mastheadImageCarouselOnly" class="masthead-slider overflow-hidden js-masthead-slider-8">
                <div class="swiper-wrapper">
                    @foreach ($carousels as $carousel)
                        <div class="swiper-slide">
                            <a href="{{ route('carousel.detail', $carousel->id) }}"><img src="carousel-images/{{ $carousel->thumbnail }}" alt="image" style="width: -webkit-fill-available;max-height:400px"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Carousel --}}
