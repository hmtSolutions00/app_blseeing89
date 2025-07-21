
<header data-add-bg="bg-dark-1" class="header  js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container container">
        <div class="row justify-between items-center">
            <div class="row col-lg-12 pb-0 pt-0 items-center">
                <div class="col-4 col-lg-3">
                    <a href="{{ url('/') }}" class="header-logo mr-30" data-x="header-logo" data-x-toggle="is-logo-dark" style="top:10px">
                        <img src="{{ url('assets/images/logo_kelae.png') }}" alt="logo icon">
                    </a>
                </div>
                <div class="col-6 col-lg-6 mr-30">
                    <h2 class="text-yellow-1">Blessing89 Tour & Travel</h2>
                </div>
                <div class="col-1 d-flex justify-content-end align-items-center">
                    <div class="d-flex items-center text-14 text-white gap-2 lang-selector">
                        {{-- Tombol Bendera Indonesia --}}
                        <button class="lang-option-btn" data-lang="id">
                            <img src="{{ asset('uploads/lang/indonesia.png') }}" alt="Indonesia Flag" width="24" height="16">
                        </button>
                        <span class="text-white">|</span>
                        {{-- Tombol Bendera Inggris --}}
                        <button class="lang-option-btn" data-lang="en">
                            <img src="{{ asset('uploads/lang/united-kingdom.png') }}" alt="United Kingdom Flag" width="24" height="16">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
