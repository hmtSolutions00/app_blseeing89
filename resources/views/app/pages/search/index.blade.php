@extends('app.layouts.index')

@push('custom_css')
<style>
  @media (max-width: 768px) {
    .search-container form {
      flex-direction: column !important;
      width: 100%;
      gap: 10px;
    }

    .search-container .single-field {
      flex-direction: column;
      width: 100%;
    }

    .search-container input.form-control,
    .search-container button.button {
      height: 46px !important;
      font-size: 14px;
      width: 100%;
    }
  }
</style>
@endpush

@push('dynamic_tag')
    <title>Hasil Pencarian: {{ $keyword }} | Blessing89 Tour Travel</title>
    <meta name="description" content="Hasil pencarian produk: {{ $keyword }}">
@endpush

@section('content')
<section class="pt-10">
    <div class="container">
        <h1 class="text-30 fw-600 mb-20">Hasil Pencarian: "{{ $keyword }}"</h1>

        {{-- Form Search --}}
        <div class="row y-gap-30 justify-center items-center">
            <div class="search-container w-100">
                <form action="{{ route('frontend.search') }}" method="GET"
                      class="d-flex flex-column gap-2 d-md-flex flex-md-row align-items-md-center">
                    <div class="single-field -w-410 d-flex x-gap-10 y-gap-10">
                        <div>
                            <input class="bg-white h-60 "
                                   type="text"
                                   name="keyword"
                                   value="{{ request('keyword') }}"
                                   placeholder="Cari produk"
                                   style="border: 1px solid #1e73be; border-radius: 4px; padding: 0 16px;">
                        </div>
                        <div>
                            <button type="submit" class="button -md h-60 bg-blue-1 text-white">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- End Form Search --}}

        @if ($products->count())
            <div class="row y-gap-30 mt-30">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-3 col-sm-6 product-col">
                        <a href="{{ route('frontend.products.show', [
                            $product->subcategory->category->slug ?? 'kategori',
                            $product->subcategory->slug ?? 'subkategori',
                            $product->slug,
                        ]) }}" class="hotelsCard -type-1">
                            <div class="hotelsCard__image">
                                <div class="cardImage ratio ratio-1:1">
                                    <div class="cardImage__content">
                                        <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                                            <div class="swiper-wrapper">
                                                @forelse ($product->images_array as $image)
                                                    <div class="swiper-slide">
                                                        <img class="col-12" src="{{ asset($image) }}" alt="{{ $product->name }}">
                                                    </div>
                                                @empty
                                                    <div class="swiper-slide">
                                                        <img class="col-12" src="{{ asset('default-image.jpg') }}" alt="Tidak ada gambar">
                                                    </div>
                                                @endforelse
                                            </div>
                                            <div class="cardImage-slider__pagination js-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="cardImage__wishlist">
                                        <button type="button"
                                            onclick="shareProduct('{{ route('frontend.products.show', [
                                                $product->subcategory->category->slug ?? 'kategori',
                                                $product->subcategory->slug ?? 'subkategori',
                                                $product->slug,
                                            ]) }}')"
                                            class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                            <i class="icon-share"></i>
                                        </button>
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
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-20">
                {{ $products->appends(['keyword' => $keyword])->links() }}
            </div>
        @else
            <div class="alert alert-warning mt-30">
                Tidak ada produk ditemukan untuk kata kunci: <strong>{{ $keyword }}</strong>
            </div>
        @endif
    </div>
</section>
@endsection
