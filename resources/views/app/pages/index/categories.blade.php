<section class="layout-pt-md layout-pb-md">
  <div class="container">
    <div class="sectionTitle -md mb-20">
      <h2 class="sectionTitle__title">Produk & Layanan Kami</h2>
      <p class="sectionTitle__text mt-5 sm:mt-0">Kategori Produk Blessing89 Tour & Travel</p>
    </div>

    <div class="product-category-scroll">
      <div class="category-grid">
        @foreach ($categories as $category)
          <div class="category-card">
            <a href="{{ route('frontend.products.subcategories', $category->slug) }}" class="d-block text-center bg-white shadow-2 rounded-4 p-10 hover-up transition-3">
              <div class="ratio ratio-1:1 mb-10">
                <img class="img-ratio js-lazy rounded-4" data-src="{{ asset($category->thumbnail) }}" src="#" alt="{{ $category->name }}">
              </div>
              <div class="text-14 fw-600 text-dark-1 mt-5">{{ $category->name }}</div>
              <div class="text-12 text-light-1">{{ $category->products_count }} produk</div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
