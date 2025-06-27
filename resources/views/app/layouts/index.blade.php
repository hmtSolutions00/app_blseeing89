<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- meta tags default for all-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Dinamis Meta tags --}}
    @include('app.layouts.assets.tag_head')
    {{-- end dinamis meta tags --}}
    <!-- Google fonts -->
    <link rel="preconnect" href="{{ url('assets//fonts.googleapis.com/index.html') }}">
    <link rel="preconnect" href=".{{ url('assets//fonts.gstatic.com/index.html') }}" crossorigin>
    <link href="{{ url('assets/fonts.googleapis.com/css29b3e.css?family=Jost:wght@400;500;600&amp;display=swap') }}"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- End meta tags default for all --}}
    @include('app.layouts.assets.css')
    <link rel="stylesheet" href="{{ url('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">

</head>

<body>
    {{-- preloader --}}
    @if (Route::currentRouteName() === 'index')
        @include('app.layouts.assets.preloader')
    @endif
    {{-- preloader --}}
    <main style="font-family: var(--font-primary);">

      {{-- Start Menu & carousel condition --}}
      @include('app.layouts.assets.header')
 
    <section data-anim-wrap class="masthead -type-2 js-mouse-move-container bg-dark-3">
      <div class="masthead__bg ">
        <img src="{{url('assets/img/masthead/2/bg.png')}}" alt="image">
      </div>
        {{-- Start Menu & carousel condition --}}
            <div class="container">
                <!-- menu -->
                @include('app.layouts.assets.header')
                <!-- menu -->
                @include('app.layouts.assets.menu')
                <!-- Carousel -->
                @if (Route::currentRouteName() === 'index')
                    @include('app.pages.index.carousel')
                @endif

            </div>
        </section>

        {{-- END Start Menu & carousel condition --}}
        @yield('content')



        <footer class="footer -type-1 text-white bg-dark-2">
            <div class="container">
                <div class="pt-60 pb-60">
                    <div class="row y-gap-40 justify-between xl:justify-start">
                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Contact Us</h5>

                            <div class="mt-30">
                                <div class="text-14 mt-30">Toll Free Customer Care</div>
                                <a href="#" class="text-18 fw-500 mt-5">+(1) 123 456 7890</a>
                            </div>

                            <div class="mt-35">
                                <div class="text-14 mt-30">Need live support?</div>
                                <a href="#" class="text-18 fw-500 mt-5">hi@gotrip.com</a>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Company</h5>
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="#">About Us</a>
                                <a href="#">Careers</a>
                                <a href="#">Blog</a>
                                <a href="#">Press</a>
                                <a href="#">Gift Cards</a>
                                <a href="#">Magazine</a>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Support</h5>
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="#">Contact</a>
                                <a href="#">Legal Notice</a>
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms and Conditions</a>
                                <a href="#">Sitemap</a>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Other Services</h5>
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="#">Car hire</a>
                                <a href="#">Activity Finder</a>
                                <a href="#">Tour List</a>
                                <a href="#">Flight finder</a>
                                <a href="#">Cruise Ticket</a>
                                <a href="#">Holiday Rental</a>
                                <a href="#">Travel Agents</a>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Mobile</h5>

                            <div class="d-flex items-center px-20 py-10 rounded-4 border-white-15">
                                <div class="icon-apple text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14 text-white">Download on the</div>
                                    <div class="text-15 lh-1 fw-500">Apple Store</div>
                                </div>
                            </div>

                            <div class="d-flex items-center px-20 py-10 rounded-4 border-white-15 mt-20">
                                <div class="icon-play-market text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14 text-white">Get in on</div>
                                    <div class="text-15 lh-1 fw-500">Google Play</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-20 border-top-white-15">
                    <div class="row justify-between items-center y-gap-10">
                        <div class="col-auto">
                            <div class="row x-gap-30 y-gap-10">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        © 2022 GoTrip LLC All rights reserved.
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="d-flex x-gap-15">
                                        <a href="#">Privacy</a>
                                        <a href="#">Terms</a>
                                        <a href="#">Site Map</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="row y-gap-10 items-center">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <button class="d-flex items-center text-14 fw-500 text-white mr-10">
                                            <i class="icon-globe text-16 mr-10"></i>
                                            <span class="underline">English (US)</span>
                                        </button>

                                        <button class="d-flex items-center text-14 fw-500 text-white">
                                            <i class="icon-usd text-16 mr-10"></i>
                                            <span class="underline">USD</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="d-flex x-gap-20 items-center">
                                        <a href="#"><i class="icon-facebook text-14"></i></a>
                                        <a href="#"><i class="icon-twitter text-14"></i></a>
                                        <a href="#"><i class="icon-instagram text-14"></i></a>
                                        <a href="#"><i class="icon-linkedin text-14"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <div class="langMenu is-hidden js-langMenu" data-x="lang" data-x-toggle="is-hidden">
        <div class="langMenu__bg" data-x-click="lang"></div>

        <div class="langMenu__content bg-white rounded-4">
            <div class="d-flex items-center justify-between px-30 py-20 sm:px-15 border-bottom-light">
                <div class="text-20 fw-500 lh-15">Select your language</div>
                <button class="pointer" data-x-click="lang">
                    <i class="icon-close"></i>
                </button>
            </div>

            <div class="modalGrid px-30 py-30 sm:px-15 sm:py-15">

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="currencyMenu is-hidden js-currencyMenu" data-x="currency" data-x-toggle="is-hidden">
        <div class="currencyMenu__bg" data-x-click="currency"></div>

        <div class="currencyMenu__content bg-white rounded-4">
            <div class="d-flex items-center justify-between px-30 py-20 sm:px-15 border-bottom-light">
                <div class="text-20 fw-500 lh-15">Select your currency</div>
                <button class="pointer" data-x-click="currency">
                    <i class="icon-close"></i>
                </button>
            </div>

            <div class="modalGrid px-30 py-30 sm:px-15 sm:py-15">

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mapFilter" data-x="mapFilter" data-x-toggle="-is-active">
        <div class="mapFilter__overlay"></div>

        <div class="mapFilter__close">
            <button class="button -blue-1 size-40 bg-white shadow-2" data-x-click="mapFilter">
                <i class="icon-close text-15"></i>
            </button>
        </div>

        <div class="mapFilter__grid" data-x="mapFilter__grid" data-x-toggle="-filters-hidden">
            <div class="mapFilter-filter scroll-bar-1">
                <div class="px-20 py-20 md:px-15 md:py-15">
                    <div class="d-flex items-center justify-between">
                        <div class="text-18 fw-500">Filters</div>

                        <button class="size-40 flex-center rounded-full bg-blue-1" data-x-click="mapFilter__grid">
                            <i class="icon-chevron-left text-12 text-white"></i>
                        </button>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Popular Filters</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Breakfast Included</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Romantic</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Airport Transfer</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">WiFi Included </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">5 Star</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Nightly Price</h5>
                        <div class="row x-gap-10 y-gap-30">
                            <div class="col-12">
                                <div class="js-price-rangeSlider">
                                    <div class="text-14 fw-500"></div>

                                    <div class="d-flex justify-between mb-20">
                                        <div class="text-15 text-dark-1">
                                            <span class="js-lower"></span>
                                            -
                                            <span class="js-upper"></span>
                                        </div>
                                    </div>

                                    <div class="px-5">
                                        <div class="js-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Amenities</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Breakfast Included</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">WiFi Included </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Pool</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Restaurant </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Air conditioning </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
                        <div class="row x-gap-10 y-gap-10 pt-10">

                            <div class="col-auto">
                                <a href="#"
                                    class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">1</a>
                            </div>

                            <div class="col-auto">
                                <a href="#"
                                    class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">2</a>
                            </div>

                            <div class="col-auto">
                                <a href="#"
                                    class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">3</a>
                            </div>

                            <div class="col-auto">
                                <a href="#"
                                    class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">4</a>
                            </div>

                            <div class="col-auto">
                                <a href="#"
                                    class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">5</a>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Any</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Wonderful 4.5+</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Very good 4+</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Good 3.5+ </div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Style</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Budget</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Mid-range </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Luxury</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Family-friendly </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Business </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Neighborhood</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Central London</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Guests&#39; favourite area </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Westminster Borough</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Kensington and Chelsea </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Oxford Street </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mapFilter-results scroll-bar-1">
                <div class="px-20 py-20 md:px-15 md:py-15">
                    <div class="row y-gap-10 justify-between">
                        <div class="col-auto">
                            <div class="text-14 text-light-1">
                                <span class="text-dark-1 text-15 fw-500">3,269 properties</span>
                                in Europe
                            </div>
                        </div>

                        <div class="col-auto">
                            <button class="button -blue-1 h-40 px-20 md:px-5 text-blue-1 bg-blue-1-05 rounded-100">
                                <i class="icon-up-down mr-10"></i>
                                Top picks for your search
                            </button>
                        </div>
                    </div>


                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mapFilter-map">
                <div class="map js-map"></div>
            </div>
        </div>
    </div>

    {{-- Start Java Script --}}
    @include('app.layouts.assets.js')
    {{-- End Java Script --}}

</body>

</html>
