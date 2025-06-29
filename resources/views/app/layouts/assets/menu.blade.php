@php
    $currentRoute = Route::currentRouteName();
@endphp

<div data-anim-child="fade delay-1" class="masthead__tabs pt-90">
    <div class="row">
        <div class="col-12">
            <div class="tabs -bookmark-2 js-tabs">
                <div class="tabs__controls d-flex items-center js-tabs-controls">

                    <div>
                        <a href="{{ route('index') }}"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button {{ $currentRoute === 'index' ? 'is-tab-el-active' : '' }}">
                            <i class="fa-solid fa-house text-20 mr-10 sm:mr-5"></i>
                            Home
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('frontend.products.layanan') }}"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button {{ $currentRoute === 'frontend.products.layanan' ? 'is-tab-el-active' : '' }}">
                            <i class="fa-solid fa-box text-20 mr-10 sm:mr-5"></i>
                            Produk & Layanan
                        </a>
                    </div>
                    <div class="">
                        <a href="#testimonial_section"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button "
                            data-tab-target=".-tab-item-3">
                            <i class="fa-solid fa-star text-20 mr-10 sm:mr-5"></i> Testimoni </a>
                    </div>

                    <div>
                        <a href="{{ route('galeri.list') }}"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button {{ $currentRoute === 'frontend.galeri' ? 'is-tab-el-active' : '' }}">
                            <i class="fa-solid fa-image text-20 mr-10 sm:mr-5"></i>
                            Galeri
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('aboutus.index') }}"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button {{ $currentRoute === 'aboutus.index' ? 'is-tab-el-active' : '' }}">
                            <i class="fa-solid fa-circle-info text-20 mr-10 sm:mr-5"></i>
                            Tentang Kami
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('aboutus.index') }}"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button {{ $currentRoute === 'frontend.kontak' ? 'is-tab-el-active' : '' }}">
                            <i class="fa-solid fa-phone text-20 mr-10 sm:mr-5"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <div>
                        <a href="#"
                            class="tabs__button px-30 py-20 sm:px-20 sm:py-15 rounded-4 fw-600 text-white js-tabs-button {{ $currentRoute === 'frontend.panduan' ? 'is-tab-el-active' : '' }}">
                            <i class="fa-solid fa-book-open text-20 mr-10 sm:mr-5"></i>
                            Panduan
                        </a>
                    </div>

                </div>

                {{-- Optional: jika kamu tetap pakai tab-content --}}
                <div class="tabs__content js-tabs-content">
                    <div class="tabs__pane -tab-item-1 {{ $currentRoute === 'home' ? 'is-tab-el-active' : '' }}"></div>
                    <div
                        class="tabs__pane -tab-item-2 {{ $currentRoute === 'frontend.products.layanan' ? 'is-tab-el-active' : '' }}">
                    </div>
                    <div
                        class="tabs__pane -tab-item-3 {{ $currentRoute === 'frontend.testimoni' ? 'is-tab-el-active' : '' }}">
                    </div>
                    <div
                        class="tabs__pane -tab-item-4 {{ $currentRoute === 'frontend.galeri' ? 'is-tab-el-active' : '' }}">
                    </div>
                    <div
                        class="tabs__pane -tab-item-5 {{ $currentRoute === 'frontend.tentang' ? 'is-tab-el-active' : '' }}">
                    </div>
                    <div
                        class="tabs__pane -tab-item-6 {{ $currentRoute === 'frontend.kontak' ? 'is-tab-el-active' : '' }}">
                    </div>
                    <div
                        class="tabs__pane -tab-item-7 {{ $currentRoute === 'frontend.panduan' ? 'is-tab-el-active' : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
