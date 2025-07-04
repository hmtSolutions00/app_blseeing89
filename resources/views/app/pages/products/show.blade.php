@extends('app.layouts.index')

@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  .only-desktop { display: block; }
  .only-mobile { display: none; }
  @media (max-width: 768px) {
    .only-desktop { display: none !important; }
    .only-mobile { display: block !important; }
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
{{-- Single Menu --}}
  <div class="singleMenu js-singleMenu mt-80">
      <div class="singleMenu__content">
        <div class="container">
          <div class="row y-gap-20 justify-between items-center">
            <div class="col-auto">
              <div class="singleMenu__links row x-gap-30 y-gap-10">
                <div class="col-auto">
                  <a href="#overview">Overview</a>
                </div>
                <div class="col-auto">
                  <a href="{{ asset($product->thumbnail)}}" class="js-gallery" data-gallery="gallery2">Gambar</a>
                </div>
                <div class="col-auto">
                  <a href="#details">Itinerary</a>
                </div>
                <div class="col-auto">
                  <a href="#similiar">Produk Sama</a>
                </div>
              </div>
            </div>

            <div class="col-auto">
              <div class="row x-gap-15 y-gap-15 items-center">
                <div class="col-auto">
                  <div class="text-14">
                    From
                    <span class="text-22 text-dark-1 fw-500">Rp. {{ number_format($product->price_start, 0, ',', '.')  }} </span>
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

                <div class="col-auto">

                  <a href="{{ $whatsappLink }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                    Pesan Sekarang &nbsp;<i class="fab fa-whatsapp text-white mr-10"></i>
                  </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Gambar --}}
     <section class="pt-40">
      <div class="container">
        <div class="row y-gap-20 justify-between items-end">
          <div class="col-auto">
            <div class="row x-gap-20  items-center">
              <div class="col-auto">
                <h1 class="text-30 sm:text-25 fw-600">{{$product->name}}</h1>
         
              </div>

              <div class="col-auto">

                <i class="icon-star text-10 text-yellow-1"></i>

                <i class="icon-star text-10 text-yellow-1"></i>

                <i class="icon-star text-10 text-yellow-1"></i>

                <i class="icon-star text-10 text-yellow-1"></i>

                <i class="icon-star text-10 text-yellow-1"></i>

              </div>
            </div>

            <div class="row x-gap-20 y-gap-20 items-center">
              <div class="col-auto">
                <div class="d-flex items-center text-15 text-light-1">
                  <i class="icon-location-2 text-16 mr-5"></i>
                  {{$product->name}}
                </div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <div class="row x-gap-15 y-gap-15 items-center">
              <div class="col-auto">
                <div class="text-14">
                  From
                  <span class="text-22 text-dark-1 fw-500"> Rp. {{ number_format($product->price_start, 0, ',', '.')  }} </span>
                </div>
              </div>

              <div class="col-auto">
                    
                 <a href="{{ $whatsappLink }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                    Pesan Sekarang &nbsp; <i class="fab fa-whatsapp text-white mr-10"></i>
                  </a>

              </div>
            </div>
          </div>
        </div>

        <div class="galleryGrid -type-1 pt-30">
          {{-- Aakan dimunculkan apabila tampilan PC/resolusi laptop di android di hide --}}
           @foreach ($product->images as $image)
          <div class="galleryGrid__item">
            <img src="{{ asset($image) }}" alt="image" class="rounded-4">
          </div>
          @endforeach
          {{-- End dimunculkan apabial di pc resolusi --}}

          <div class="galleryGrid__item relative d-flex">
            <img src="{{ url($product->thumbnail) }}" alt="image" class="rounded-8">

            <div class="absolute px-10 py-10 col-12 h-full d-flex justify-end items-end">
              <a href="{{ asset($product->thumbnail) }}" class="button -blue-1 px-24 py-15 bg-white text-dark-1 js-gallery" data-gallery="gallery2">
                Semua Gambar
              </a>
             @foreach ($product->images as $image)
              <a href="{{ url($image) }}" class="js-gallery" data-gallery="gallery2"></a>
               @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

{{-- Property Product --}}
 <section class="pt-30">
      <div class="container">
        <div class="row y-gap-30">
          <div class="col-xl-8">
            <div class="row y-gap-40">
              <div class="col-12">
                <h3 class="text-22 fw-500">Property highlights</h3>
                <div class="row y-gap-20 pt-30">

                  <div class="col-lg-3 col-6">
                    <div class="text-center">
                       <i class="fas fa-calendar-alt text-24 text-blue-1 mr-10"></i>
                      <div class="text-15 lh-1 mt-10">{{ $product->masa_berlaku }}</div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="text-center">
                      <i class="fas fa-layer-group text-22 text-blue-1 mr-10"></i>
                      <div class="text-15 lh-1 mt-10">{{ $category->name }}</div>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <div class="text-center">
                       <i class="fas fa-tags text-22 text-blue-1 mr-10"></i>
                      <div class="text-15 lh-1 mt-10">{{ $subcategory->name }}</div>
                    </div>
                  </div>
                   <div class="col-lg-3 col-6">
                    <div class="text-center">
                        <button class="button px-15 py-10 -blue-1" onclick="sharePage()">
                       <i class="fas fa-share text-22 text-blue-1 mr-10"></i>
                      <div class="text-15 lh-1 mt-10">Bagikan
                      </div>
                       </button>
                    </div>
                  </div>

                </div>
              </div>

              <div id="overview" class="col-12">
                <h3 class="text-22 fw-500 pt-40 border-top-light">Overview</h3>
                <p class="text-dark-1 text-15 mt-20">
                  {!! $product->description !!}
                </p>
              </div>

              <div class="col-12" id="details">
                <h3 class="text-22 fw-500 pt-40 border-top-light">Itinerary Produk</h3>
                <div class="row y-gap-10 pt-20">

                   <div class="col-lg-12">
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

            </div>
          </div>

          <div class="col-xl-4" id="similiar">
            <div class="ml-50 lg:ml-0">
              <div class="px-30 py-30 border-light rounded-4 shadow-4">
                <div class="d-flex items-center justify-between">
                  <div class="">
                    <span class="text-20 fw-500">Rekomendasi produk</span>
                    <span class="text-14 text-light-1 ml-5">{{$subcategory->name}}</span>
                  </div>
                </div>

                <div class="row y-gap-20 pt-30">
                  <div class="col-12">
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
              <div class="mt-5">
                Start from <span class="text-blue-1"> Rp.{{number_format($product->price_start, 0, ',', '.')  }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
                  </div>
                </div>
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
      }).then(() => console.log('Berhasil dibagikan'))
        .catch(err => console.log('Gagal membagikan', err));
    } else {
      navigator.clipboard.writeText(window.location.href);
      alert('Link disalin ke clipboard.');
    }
  }
</script>
@endsection
