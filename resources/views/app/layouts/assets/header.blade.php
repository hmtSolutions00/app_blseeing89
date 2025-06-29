 <style>
     @media screen and (max-width: 1000px) {
         h2 {
             font-size: 1.3rem;
         }
     }
 </style>
 <header data-add-bg="bg-dark-1" class="header  js-header" data-x="header" data-x-toggle="is-menu-opened" style="z-index: 600">
     <div data-anim="fade" class="header__container container">
         <div class="row">
             <div class="row col-lg-12 pb-0 pt-0 items-center">
                 {{-- <div class="col-1">
                     <button class="d-flex items-center icon-menu text-white text-20"
                         data-x-click="desktopMenu"></button>
                 </div> --}}
                 <div class="col-3 mr-30">
                     <a href="{{ url('/') }}" class="header-logo mr-30" data-x="header-logo"
                         data-x-toggle="is-logo-dark">
                         <img src="{{ url('assets/images/logo_kelae.png') }}" alt="logo icon">
                     </a>
                 </div>
                 <div class="col-6 mr-30">
                     <h2 class="text-yellow-1">Blessing89 Tour & Travel</h2>
                 </div>
                 <div class="col-1" style="justify-items: right;">

                     <button class="d-flex items-center text-14 text-white gap-2 lang-toggle" id="langToggleButton">
                         <span class="lang-option active" data-lang="id">ID</span> |
                         <span class="lang-option" data-lang="en">EN</span>
                     </button>
                 </div>
                 {{-- Menu --}}
                 {{-- <div class="desktopMenu js-desktopMenu" data-x="desktopMenu" data-x-toggle="is-menu-active">
                     <div class="desktopMenu-overlay"></div>

                     <div class="desktopMenu__content">
                         <div class="mobile-bg js-mobile-bg"></div>

                         <div class="px-30 py-20 sm:px-20 sm:py-10 border-bottom-light">
                             <div class="row justify-between items-center">
                                 <div class="col-auto">
                                     <div class="text-20 fw-500">Main Menu</div>
                                 </div>

                                 <div class="col-auto">
                                     <button class="icon-close text-15" data-x-click="desktopMenu"></button>
                                 </div>
                             </div>
                         </div>

                         <div class="h-full px-30 py-30 sm:px-0 sm:py-10">
                             <div class="menu js-navList">
                                 <ul class="menu__nav  -is-active">
                                     <li>
                                         <a href="{{ route('index') }}">
                                             Beranda
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ route('frontend.products.layanan') }}">
                                             Produk & Layanan
                                         </a>
                                     </li>
                                     <li>
                                         <a href="#testimonial_section">
                                             Testimoni
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ route('galeri.list') }}">
                                             Galeri
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ route('aboutus.index') }}">
                                             Tengtang Kami
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ route('aboutus.index') }}">
                                             Hubungi Kami
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ route('index') }}">
                                             Panduan Pengguna
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div> --}}
                 {{-- End menu --}}
             </div>
         </div>

     </div>

 </header>
