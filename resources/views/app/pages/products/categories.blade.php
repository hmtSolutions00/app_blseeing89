@extends('app.layouts.index')

@section('custom_css')
<style>
  .category-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr); /* default 6 kolom */
    gap: 20px;
  }

  @media (max-width: 1024px) {
    .category-grid {
      grid-template-columns: repeat(4, 1fr); /* tablet */
    }
  }

  @media (max-width: 768px) {
    .category-grid {
      grid-template-columns: repeat(3, 1fr); /* mobile */
    }
  }

  .category-card {
    padding: 15px;
    background-color: #ffffff;
    border: 2px solid #ffcc00; /* kuning keemasan */
    border-radius: 12px;
    text-align: center;
    box-sizing: border-box;
    transition: transform 0.2s ease;
  }

  .category-card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .category-card img {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
  }

  .category-card .text-14 {
    height: 42px;
    overflow: hidden;
    font-size: 14px;
    line-height: 1.2;
    text-overflow: ellipsis;
  }

  @media (max-width: 576px) {
    .category-card {
      padding: 10px;
    }

    .category-card img {
      height: 80px;
    }

    .category-card .text-14 {
      font-size: 12px;
      height: auto;
    }

    .category-card .text-12 {
      font-size: 10px;
    }
  }
</style>
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
                <div class="text-dark-1">Produk & Layanan</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="layout-pt-md layout-pb-md">
  <div class="container">
            
    <div class="sectionTitle -md mb-20">
      <h2 class="sectionTitle__title">Produk & Layanan Kami</h2>
      <p class="sectionTitle__text mt-5 sm:mt-0">Kategori Produk Blessing89 Tour & Travel</p>
    </div>

    <div class="category-grid">
      @foreach ($categories as $category)
        <div class="category-card">
          <a href="{{ route('frontend.products.subcategories', $category->slug) }}">
            <img src="{{ asset($category->thumbnail) }}" alt="{{ $category->name }}">
            <div class="text-14 fw-600 text-dark-1 mt-10">{{ $category->name }}</div>
            <div class="text-12 text-light-1">{{ $category->products_count }} produk</div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
