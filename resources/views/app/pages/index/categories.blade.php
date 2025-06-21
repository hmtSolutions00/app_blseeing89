  <section class="layout-pt-md layout-pb-md">
      <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Produk & Layanan Kami</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">Kategori Produk Blessing89 Tour & Travel</p>
            </div>
          </div>

          <div class="col-auto">

            <div class="d-flex x-gap-15 items-center justify-center pt-40 sm:pt-20">
              <div class="col-auto">
                <button class="d-flex items-center text-24 arrow-left-hover js-places-prev">
                  <i class="icon icon-arrow-left"></i>
                </button>
              </div>

              <div class="col-auto">
                <div class="pagination -dots text-border js-places-pag"></div>
              </div>

              <div class="col-auto">
                <button class="d-flex items-center text-24 arrow-right-hover js-places-next">
                  <i class="icon icon-arrow-right"></i>
                </button>
              </div>
            </div>

          </div>
        </div>

        <div class="pt-40 overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-5 lg-3 md-2 sm-2 base-1" data-nav-prev="js-places-prev" data-pagination="js-places-pag" data-nav-next="js-places-next">
         <div class="swiper-wrapper">
  @foreach ($categories as $category)
    <div data-anim-child="slide-left delay-{{ $loop->iteration + 3 }}" class="swiper-slide">
      <a href="{{ route('frontend.products.byCategory', $category->slug) }}" class="citiesCard -type-2 ">
        <div class="citiesCard__image rounded-4 ratio ratio-3:4">
          <img class="img-ratio rounded-4 js-lazy" data-src="{{ asset($category->thumbnail) }}" src="#" alt="{{ $category->name }}">
        </div>

        <div class="citiesCard__content mt-10">
          <h4 class="text-18 lh-13 fw-500 text-dark-1">{{ $category->name }}</h4>
          {{-- Untuk bagian in apakah bis akita melakukan penghitungan jumlah product yang ada di dalam kategori ini --}}
          <div class="text-14 text-light-1">{{ $category->products_count }} Products & Layanan Tersedia</div>
        </div>
      </a>
    </div>
  @endforeach
</div>


        </div>
      </div>
    </section>