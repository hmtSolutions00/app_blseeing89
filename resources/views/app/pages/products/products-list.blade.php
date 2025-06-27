@extends('app.layouts.index')

@section('custom_css')
<style>
  @media (max-width: 768px) {
    .product-col {
      width: 50% !important;
    }
  }
</style>
@endsection

@section('content')
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
        </div>
      </div>
      <div class="col-auto">
        <a href="{{ route('frontend.products.byCategory', $category->slug) }}" class="text-14 text-blue-1 underline">
          Semua Produk & Layanan ({{ $category->name }})
        </a>
      </div>
    </div>
  </div>
</section>

<section class="pt-10">
  <div class="container">
    <div class="row y-gap-15 justify-between items-center">
      <div class="col-auto d-flex items-center gap-20">
        <h1 class="text-30 fw-600 mb-0">{{ $subcategory->name }}</h1>
        <button class="button px-15 py-10 -blue-1" onclick="sharePage()">
          <i class="icon-share mr-10"></i> Bagikan
        </button>
      </div>
    </div>
    <div class="row pt-10">
      <div class="col-12">
        <div class="text-14 text-light-1">{{ $subcategory->description }}</div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-lg">
  <div data-anim-wrap class="container">
    <div class="tabs -pills-2 js-tabs">
      <div class="tabs__content pt-40 js-tabs-content">
        <div class="tabs__pane -tab-item-1 is-tab-el-active">
          <div class="row y-gap-30">
            @if($products->count())
              @foreach ($products as $product)
                <div class="col-xl-3 col-lg-3 col-sm-6 product-col">
                  <a href="#" class="hotelsCard -type-1">
                    <div class="hotelsCard__image">
                      <div class="cardImage ratio ratio-1:1">
                        <div class="cardImage__content">
                          <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                            <div class="swiper-wrapper">
                              @foreach ($product->images_array as $image)
                                <div class="swiper-slide">
                                  <img class="col-12" src="{{ asset($image) }}" alt="{{ $product->name }}">
                                </div>
                              @endforeach
                            </div>
                            <div class="cardImage-slider__pagination js-pagination"></div>
                            <div class="cardImage-slider__nav -prev">
                              <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                                <i class="icon-chevron-left text-10"></i>
                              </button>
                            </div>
                            <div class="cardImage-slider__nav -next">
                              <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                                <i class="icon-chevron-right text-10"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="cardImage__wishlist">
                          <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                            <i class="icon-heart text-12"></i>
                          </button>
                        </div>
                        <div class="cardImage__leftBadge">
                          <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-dark-1 text-white">
                            Blessing89 Tour& Travel
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="hotelsCard__content mt-10">
                      <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                        <span>{{ $product->name }}</span>
                      </h4>
                      <p class="text-light-1 lh-14 text-14 mt-5">
                        {{ \Illuminate\Support\Str::words(strip_tags($product->description), 12, '...') }}
                      </p>
                      <div class="d-flex items-center mt-20">
                        <button onclick="navigator.clipboard.writeText(window.location.href)" class="button -blue-1 size-30 rounded-4 text-white text-12">
                          <i class="icon-share"></i>
                        </button>
                        <div class="text-14 text-dark-1 fw-500 ml-10">Masa Berlaku</div>
                        <div class="text-14 text-light-1 ml-10">{{ $product->masa_berlaku }}</div>
                      </div>
                      <div class="mt-5">
                        <div class="fw-500">
                          Starting from <span class="text-blue-1">{{ $product->price_start }}</span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
            @else
              <div class="col-12 text-center">
                <h4 class="text-20 fw-600 mb-10">Data produk masih kosong</h4>
                <p class="text-14 text-light-1 mb-20">
                  Blessing89 akan segera update. Tunggu prosesnya ya atau hubungi admin kami.
                </p>

                @php
                  $pesan = urlencode("Halo Admin Blessing89tourtravel.com, saat ini layanan & produk anda dengan kategori *{$category->name}* dan subkategori *{$subcategory->name}* masih kosong di website. Apakah anda bisa memberikan list produknya kepada saya?");
                  $nomor = '6281234567890'; // Ganti dengan nomor WA admin
                  $urlWA = "https://wa.me/{$nomor}?text={$pesan}";
                @endphp

                <a href="{{ $urlWA }}" target="_blank" class="button px-20 py-10 -green-1 d-inline-flex items-center gap-10">
                  <i class="icon-whatsapp text-16"></i> Hubungi via WhatsApp
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('custom_js')
<script>
  function sharePage() {
    if (navigator.share) {
      navigator.share({
        title: document.title,
        text: 'Lihat halaman ini:',
        url: window.location.href
      })
      .then(() => console.log('Berhasil dibagikan'))
      .catch((err) => console.log('Gagal membagikan', err));
    } else {
      alert("Fitur 'Bagikan' tidak didukung di browser ini");
    }
  }
</script>
@endsection
