<div class="dashboard__sidebar bg-white scroll-bar-1">
    <div class="sidebar -dashboard">

        <div class="sidebar__item">
            <div class="sidebar__button @if(Request::routeIs('admin-panel.products.*')) -is-active @endif">
                {{-- Menggunakan named route untuk href --}}
                <a href="{{ route('admin-panel.products.index') }}" class="d-flex items-center text-15 lh-1 fw-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-15 icon-menu" width="24px" height="24px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    Produk & Layanan
                </a>
            </div>
        </div>

        <div class="sidebar__item">
            <div class="sidebar__button @if(Request::routeIs('admin-panel.categories.*')) -is-active @endif">
                {{-- Menggunakan named route untuk href --}}
                <a href="{{ route('admin-panel.categories.index') }}" class="d-flex items-center text-15 lh-1 fw-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-15 icon-menu" width="24px" height="24px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.529 11.121A5.75 5.75 0 0 1 15 12.75h1.25a.75.75 0 0 0 .75-.75V7.5C17 6.672 16.328 6 15.5 6H7.75c-.828 0-1.5.672-1.5 1.5v3.25a.75.75 0 0 0 .75.75H8.75ZM20.25 12.75c0 .414-.336.75-.75.75h-.75a.75.75 0 0 1-.75-.75V8.25c0-.414.336-.75.75-.75h.75c.414 0 .75.336.75.75v4.5ZM13.5 12.75h.75a.75.75 0 0 0 .75-.75V7.5c0-.414-.336-.75-.75-.75h-.75a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75Z" />
                    </svg>
                    Kategori Produk
                </a>
            </div>
        </div>

        <div class="sidebar__item">
            <div class="sidebar__button @if(Request::routeIs('admin-panel.sub_categories.*')) -is-active @endif">
                {{-- Menggunakan named route untuk href --}}
                <a href="{{ route('admin-panel.sub_categories.index') }}" class="d-flex items-center text-15 lh-1 fw-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-15 icon-menu" width="24px" height="24px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.008v.008H3.75V6.75ZM3.75 12h.008v.008H3.75V12ZM3.75 17.25h.008v.008H3.75V17.25Z" />
                    </svg>
                    Sub Kategori Produk
                </a>
            </div>
        </div>

        <div class="sidebar__item">
            <div class="sidebar__button">
                <a href="/admin-panel/carousel" class="d-flex items-center text-15 lh-1 fw-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mr-15 icon-menu" width="24px" height="24px"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <rect x="3" y="5" width="18" height="14" rx="2" ry="2" />
                        <rect x="6" y="8" width="12" height="8" rx="1" ry="1" fill="#FFF" />
                        <path d="M9 14.5l3-3 3 3" />
                        <circle cx="15" cy="10" r="1.5" />
                    </svg>
                    Carousel
                </a>
            </div>
        </div>

        <div class="sidebar__item">
            <div class="sidebar__button">
                <a href="/admin-panel/user" class="d-flex items-center text-15 lh-1 fw-500">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="size-6 mr-15 icon-menu" version="1.1"
                        id="_x32_" width="24px" height="24px" viewBox="0 0 512 512">
                        <rect x="3" y="5" width="18" height="14" rx="2" ry="2" />
                        <rect x="6" y="8" width="12" height="8" rx="1" ry="1"
                            fill="#FFF" />
                        <path class="st0" fill="#2196F3"
                            d="M147.57,320.188c-0.078-0.797-0.328-1.531-0.328-2.328v-6.828c0-3.25,0.531-6.453,1.594-9.5   c0,0,17.016-22.781,25.063-49.547c-8.813-18.594-16.813-41.734-16.813-64.672c0-5.328,0.391-10.484,0.938-15.563   c-11.484-12.031-27-18.844-44.141-18.844c-35.391,0-64.109,28.875-64.109,73.75c0,35.906,29.219,74.875,29.219,74.875   c1.031,3.047,1.563,6.25,1.563,9.5v6.828c0,8.516-4.969,16.266-12.719,19.813l-46.391,18.953   C10.664,361.594,2.992,371.5,0.852,383.156l-0.797,10.203c-0.406,5.313,1.406,10.547,5.031,14.438   c3.609,3.922,8.688,6.125,14.016,6.125H94.93l3.109-39.953l0.203-1.078c3.797-20.953,17.641-38.766,36.984-47.672L147.57,320.188z" />
                        <path class="st0" fill="#2196F3"
                            d="M511.148,383.156c-2.125-11.656-9.797-21.563-20.578-26.531l-46.422-18.953   c-7.75-3.547-12.688-11.297-12.688-19.813v-6.828c0-3.25,0.516-6.453,1.578-9.5c0,0,29.203-38.969,29.203-74.875   c0-44.875-28.703-73.75-64.156-73.75c-17.109,0-32.625,6.813-44.141,18.875c0.563,5.063,0.953,10.203,0.953,15.531   c0,22.922-7.984,46.063-16.781,64.656c8.031,26.766,25.078,49.563,25.078,49.563c1.031,3.047,1.578,6.25,1.578,9.5v6.828   c0,0.797-0.266,1.531-0.344,2.328l11.5,4.688c20.156,9.219,34,27.031,37.844,47.984l0.188,1.094l3.094,39.969h75.859   c5.328,0,10.406-2.203,14-6.125c3.625-3.891,5.438-9.125,5.031-14.438L511.148,383.156z" />
                        <path class="st0" fill="#2196F3"
                            d="M367.867,344.609l-56.156-22.953c-9.375-4.313-15.359-13.688-15.359-23.969v-8.281   c0-3.906,0.625-7.797,1.922-11.5c0,0,35.313-47.125,35.313-90.594c0-54.313-34.734-89.234-77.594-89.234   c-42.844,0-77.594,34.922-77.594,89.234c0,43.469,35.344,90.594,35.344,90.594c1.266,3.703,1.922,7.594,1.922,11.5v8.281   c0,10.281-6.031,19.656-15.391,23.969l-56.156,22.953c-13.047,5.984-22.344,17.984-24.906,32.109l-2.891,37.203h139.672h139.672   l-2.859-37.203C390.211,362.594,380.914,350.594,367.867,344.609z" />
                    </svg>
                    Pengguna
                </a>
            </div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__button">
                <a href="/admin-panel/about-us" class="d-flex items-center text-15 lh-1 fw-500">
                   <i class="fa-solid fa-city fa-lg mr-15 text-center" style="width: 24px"></i>
                    About Us
                </a>
            </div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__button">
                <a href="/admin-panel/partner" class="d-flex items-center text-15 lh-1 fw-500">
                   <i class="fa-solid fa-handshake fa-lg mr-15 text-center" style="width: 24px"></i>
                    Partner
                </a>
            </div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__button">
                <a href="/admin-panel/testimonial" class="d-flex items-center text-15 lh-1 fw-500">
                   <i class="fa-solid fa-comments fa-lg mr-15 text-center" style="width: 24px"></i>
                    Testimonial
                </a>
            </div>
        </div>
                <div class="sidebar__item">
            <div class="sidebar__button">
                <a href="{{route('admin-panel.galeri.index')}}" class="d-flex items-center text-15 lh-1 fw-500">
                   <i class="fa-solid fa-camera-retro fa-lg mr-15 text-center" style="width: 24px"></i>
                    Galeri
                </a>
            </div>
        </div>
    </div>
</div>
