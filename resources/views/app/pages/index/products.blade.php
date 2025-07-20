<section class="layout-pt-md layout-pb-lg">
  <div data-anim-wrap class="container">
    <div class="tabs -pills-2 js-tabs">
      <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
        <div class="col-auto">
          <div class="sectionTitle -md">
            <h2 class="sectionTitle__title">Produk Terbaru</h2>
            <p class="sectionTitle__text mt-5 sm:mt-0">Temukan Produk Terbaru Kami Disini</p>
          </div>
        </div>
<section class="layout-pt-md layout-pb-lg">
  <div data-anim-wrap class="container">
    <div class="tabs -pills-2 js-tabs">
      <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
        <div class="col-auto">
          <div class="sectionTitle -md">
            <h2 class="sectionTitle__title">Produk Terbaru</h2>
            <p class="sectionTitle__text mt-5 sm:mt-0">Temukan Produk Terbaru Kami Disini</p>
          </div>
        </div>

        <!-- Dropdown Subkategori -->
        <div class="col-auto">
          <select id="subcategory-select"
            class="form-select text-14 fw-500 px-20 py-10 rounded-4 bg-light-2"
            style="min-width: 200px;">
            <option value="all" selected>Cari Produk Terbaru</option>
            @foreach($subcategories as $subcategory)
              <option value="{{ $subcategory->slug }}">{{ $subcategory->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Konten per tab -->
      <div class="tabs__content pt-40 js-tabs-content">
        <div class="tabs__pane -tab-item-all is-tab-el-active">
          <div class="row y-gap-30" id="subcategory-products-all">
            @forelse($latestProducts as $product)
              <div class="col-xl-3 col-lg-3 col-sm-6">
                <a href="{{ route('frontend.products.show', [$product['category_slug'], $product['subcategory_slug'], $product['slug']]) }}" class="hotelsCard -type-1">
                  <div class="hotelsCard__image">
                    <div class="cardImage ratio ratio-1:1">
                      <div class="cardImage__content">
                        <img class="rounded-4 col-12" src="{{ $product['thumbnail'] }}" alt="{{ $product['name'] }}">
                      </div>
                    </div>
                  </div>
                  <div class="hotelsCard__content mt-10">
                    <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                      <span>{{ $product['name'] }}</span>
                    </h4>
                  </div>
                </a>
              </div>
            @empty
              <div class="text-center col-12"><p>Produk tidak ditemukan</p></div>
            @endforelse
          </div>
        </div>

        @foreach($subcategories as $subcategory)
          <div class="tabs__pane -tab-item-{{ $subcategory->slug }}">
            <div class="row y-gap-30" id="subcategory-products-{{ $subcategory->slug }}">
              <div class="text-center col-12">
                <p>Memuat produk...</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@push('custom_js')
<script>
document.addEventListener("DOMContentLoaded", function () {
  const dropdown = document.getElementById("subcategory-select");
  const loadedTabs = new Set(["all"]);

  function showTab(slug) {
    document.querySelectorAll(".tabs__pane").forEach(pane => {
      pane.classList.remove("is-tab-el-active");
    });

    const tabPane = document.querySelector(`.tabs__pane.-tab-item-${slug}`);
    if (tabPane) {
      tabPane.classList.add("is-tab-el-active");
    }

    const targetContainer = document.getElementById("subcategory-products-" + slug);
    if (!targetContainer || loadedTabs.has(slug)) return;

    loadedTabs.add(slug);
    targetContainer.innerHTML = `
      <div class="text-center col-12">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <p>Memuat produk...</p>
      </div>`;

    fetch(`/produk-terbaru-by-subcategory/${slug}`)
      .then(res => res.json())
      .then(data => {
        targetContainer.innerHTML = '';

        if (data.products.length === 0) {
          targetContainer.innerHTML = '<div class="col-12 text-center"><p>Produk tidak ditemukan</p></div>';
          return;
        }

        data.products.forEach(product => {
          const html = `
            <div class="col-xl-3 col-lg-3 col-sm-6">
              <a href="/produk/${product.category_slug}/${product.subcategory_slug}/${product.slug}" class="hotelsCard -type-1">
                <div class="hotelsCard__image">
                  <div class="cardImage ratio ratio-1:1">
                    <div class="cardImage__content">
                      <img class="rounded-4 col-12" src="${product.thumbnail}" alt="${product.name}">
                    </div>
                  </div>
                </div>
                <div class="hotelsCard__content mt-10">
                  <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                    <span>${product.name}</span>
                  </h4>
                  <div class="mt-5">
                    <div class="fw-500">
                      Start from <span class="text-blue-1">${product.prioce_start}</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          `;
          targetContainer.innerHTML += html;
        });
      })
      .catch(err => {
        console.error("Fetch error:", err);
        targetContainer.innerHTML = '<div class="col-12 text-center"><p>Terjadi kesalahan saat memuat produk</p></div>';
      });
  }

  dropdown.addEventListener("change", function () {
    const slug = this.value;
    showTab(slug);
  });

  showTab("all");
});
</script>
@endpush
