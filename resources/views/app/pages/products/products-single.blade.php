@extends('app.layouts.index')

@push('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .product-image-slider {
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    border-radius: 12px;
    display: block;
    margin: 0 auto;
  }

  @media (max-width: 600px) {
    .product-image-slider {
      max-height: 300px;
      object-fit: contain;
    }
  }
</style>
@endpush

@section('content')
<!-- Breadcrumb Navigasi -->
<section class="d-flex items-center bg-light-2">
  <div class="container">
    <div class="row y-gap-10 items-center justify-between">
      <div class="col-auto">
        <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
          <div class="col-auto">Beranda</div>
          <div class="col-auto">></div>
          <div class="col-auto">Produk & Layanan</div>
          <div class="col-auto">></div>
          <div class="col-auto">{{ $category->name }}</div>
          <div class="col-auto">></div>
          <div class="col-auto text-dark-1">{{ $subcategory->name }}</div>
          <div class="col-auto">></div>
          <div class="col-auto text-dark-1">{{ $product->name }}</div>
        </div>
      </div>
      <div class="col-auto">
        <a href="{{ route('frontend.products.layanan') }}" class="text-14 text-blue-1 underline">
          Semua Produk & Layanan ({{ $category->name }})
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Judul Produk dan Tombol Share -->
<section class="pt-10">
  <div class="container">
    <div class="row y-gap-15 justify-between items-center">
      <div class="col-auto d-flex items-center gap-20">
        <h1 class="text-30 fw-600 mb-0">{{ $product->name }}</h1>
        <button class="button px-15 py-10 -blue-1" onclick="sharePage()">
          <i class="icon-share mr-10"></i> Bagikan
        </button>
      </div>
    </div>
  </div>
</section>

<!-- Slider Gambar Produk -->
<section class="pt-40 js-pin-container">
  <div class="container">
    <div class="swiper js-section-slider" data-slider-cols="base-1" data-nav-prev="js-img-prev" data-nav-next="js-img-next">
      <div class="swiper-wrapper">
        @foreach ($product->images as $image)
          <div class="swiper-slide">
            <img src="{{ asset($image) }}" alt="{{ $product->name }}" class="product-image-slider">
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
    </div>

    @php
      $whatsappNumber = '628121012019';
      $message = "Halo Admin,%0ASaya tertarik dengan produk berikut:%0A".
                "- Nama Produk: *{$product->name}*%0A".
                "- Kategori: {$category->name}%0A".
                "- Subkategori: {$subcategory->name}%0A".
                "- Masa Berlaku: {$product->masa_berlaku}%0A".
                "Mohon informasinya lebih lanjut. Terima kasih.";
      $whatsappLink = "https://wa.me/{$whatsappNumber}?text={$message}";

    @endphp

    <div class="col-12 mt-30 text-center">
      <a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer"
         class="button -dark-1 py-15 px-35 h-60 w-100 rounded-4 bg-blue-1 text-white d-inline-flex align-items-center justify-center"
         style="max-width: 400px;">
        <i class="fab fa-whatsapp text-white mr-10"></i> Pesan Sekarang
      </a>
    </div>

    <h3 class="text-22 fw-500 mt-30">Produk Snapshot</h3>
    <div class="row y-gap-30 justify-between pt-20">
      <div class="col-md-auto col-6">
        <div class="d-flex">
          <i class="fas fa-calendar-alt text-22 text-blue-1 mr-10"></i>
          <div class="text-15 lh-15">Masa Berlaku:<br> {{ $product->masa_berlaku }}</div>
        </div>
      </div>
      <div class="col-md-auto col-6">
        <div class="d-flex">
          <i class="fas fa-layer-group text-22 text-blue-1 mr-10"></i>
          <div class="text-15 lh-15">Kategori:<br> {{ $category->name }}</div>
        </div>
      </div>
      <div class="col-md-auto col-6">
        <div class="d-flex">
          <i class="fas fa-tags text-22 text-blue-1 mr-10"></i>
          <div class="text-15 lh-15">Sub Kategori:<br> {{ $subcategory->name }}</div>
        </div>
      </div>
      <div class="col-md-auto col-6">
        <div class="d-flex">
          <i class="fas fa-file-contract text-22 text-blue-1 mr-10"></i>
          <div class="text-15 lh-15">Syarat & Ketentuan<br><a href="#" class="text-blue-1 underline">Selengkapnya</a></div>
        </div>
      </div>
    </div>

    <!-- Deskripsi Produk -->
    <div class="border-top-light mt-40 mb-40"></div>
    <div class="row x-gap-40 y-gap-40">
      <div class="col-12">
        <h3 class="text-22 fw-500">Deskripsi</h3>
        <p class="text-dark-1 text-15 mt-20">{!! $product->description !!}</p>
      </div>
    </div>

    <!-- Itinerary Produk -->
    <div class="row y-gap-10">
      <div class="col-lg-12">
        <h2 class="text-22 fw-500">Itinerary Produk</h2>
      </div>
      <div class="col-lg-8">
        <div class="accordion -simple row y-gap-20 js-accordion">
          @foreach ($product->details as $detail)
            <div class="col-12">
              <div class="accordion__item px-20 py-20 border-light rounded-4">
                <div class="accordion__button d-flex items-center">
                  <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                    <i class="icon-plus"></i>
                    <i class="icon-minus"></i>
                  </div>
                  <div class="button text-dark-1">{{ $detail->title }}</div>
                </div>
                <div class="accordion__content">
                  <div class="pt-20 pl-60">
                    @foreach ($detail->subDetails as $sub)
                      <div class="d-flex items-center">
                        <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                          <i class="icon-check text-6"></i>
                        </div>
                        <p class="text-15 text-dark-1">{{ $sub->content }}</p>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Produk Terkait -->
<section class="layout-pt-md layout-pb-lg">
  <div class="container">
    <div class="border-top-light mt-40 mb-40"></div>
    <div class="row justify-between items-end">
      <div class="col-auto">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Produk Yang Sama</h2>
          <p class="sectionTitle__text mt-5 sm:mt-0">Rekomendasi Produk Yang Sama</p>
        </div>
      </div>
    </div>
    <div class="row y-gap-30">
      @foreach ($relatedProducts as $related)
        <div class="col-xl-3 col-lg-3 col-sm-6 product-col">
          <div class="hotelsCard -type-1">
            <div class="hotelsCard__image">
              <div class="cardImage ratio ratio-1:1">
                <div class="cardImage__content">
                  <img class="col-12" src="{{ asset($related->thumbnail) }}" alt="{{ $related->name }}">
                </div>
              </div>
            </div>
            <div class="hotelsCard__content mt-10">
              <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                <a href="{{ route('frontend.products.show', [$category->slug, $subcategory->slug, $related->slug]) }}">
                  {{ $related->name }}
                </a>
              </h4>
              <div class="text-14 text-light-1 mt-5">
                {{ \Illuminate\Support\Str::words(strip_tags($related->description), 12, '...') }}
              </div>
              <div class="mt-5">
                Start from <span class="text-blue-1">IDR {{ $related->price_start }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection

@push('custom_js')
<script>
  function sharePage() {
    if (navigator.share) {
      navigator.share({
        title: document.title,
        text: 'Lihat halaman ini:',
        url: window.location.href
      }).then(() => console.log('Berhasil dibagikan'))
        .catch(err => console.log('Gagal membagikan', err));
    } else {
      navigator.clipboard.writeText(window.location.href);
      alert('Link disalin ke clipboard.');
    }
  }

  new Swiper('.js-section-slider', {
    loop: true,
    navigation: {
      nextEl: '.js-img-next',
      prevEl: '.js-img-prev',
    },
  });
</script>
@endpush
