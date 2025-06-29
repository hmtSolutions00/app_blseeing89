<header data-add-bg="" class="header -dashboard bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="-left-side" style="text-align-last: center;">
            <a href="/kelola/produk" class="header-logo" data-x="header-logo" data-x-toggle="is-logo-dark">
                <img src="{{ url('assets/images/logo_kelae.png') }}" alt="logo icon">
            </a>
        </div>

        <div class="row justify-between items-center pl-60 lg:pl-20">
            <div class="col-9">
                <div class="d-flex items-center">
                    <button data-x-click="dashboard">
                        <i class="icon-menu-2 text-20"></i>
                    </button>
                </div>
            </div>

            <div class="col-1">
                <div class="d-flex items-center">

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-secondary fw-600"><i class="fa-solid fa-right-from-bracket"></i> Keluar </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
