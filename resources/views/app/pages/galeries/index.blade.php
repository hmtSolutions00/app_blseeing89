@extends('app.layouts.index')

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
                        <div class="">Galeri</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-anim-wrap class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Travel Galeri</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">
                        Lihat kebahagiaan para traveler yang telah menjelajahi dunia bersama Blessing89 Tour Travel
                    </p>
                </div>
            </div>
        </div>

        <div data-anim-child="slide-up delay-2" class="tabs -pills-3 pt-30 js-tabs">
            <div class="tabs__content pt-30 js-tabs-content">
                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="row y-gap-30">
                        @forelse ($galeriList as $galeri)
                            <div class="col-lg-4 col-sm-6">
                                <a href="{{ route('galeri.single', $galeri->slug) }}" class="blogCard -type-1 d-block">
                                    <div class="blogCard__image">
                                        <div class="ratio ratio-4:3 rounded-8">
                                            <img class="img-ratio js-lazy" 
                                                 src="{{ asset($galeri->thumbnail) }}" 
                                                 data-src="{{ asset($galeri->thumbnail) }}" 
                                                 alt="{{ $galeri->judul }}">
                                        </div>
                                    </div>

                                    <div class="pt-20">
                                        <h4 class="text-dark-1 text-18 fw-500">{{ $galeri->judul }}</h4>
                                        <div class="text-light-1 text-15 lh-14 mt-5">
                                            {{ \Carbon\Carbon::parse($galeri->created_at)->translatedFormat('F d, Y') }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">Belum ada galeri tersedia saat ini.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="border-top-light mt-30 pt-30">
                        <div class="row justify-center">
                            <div class="col-auto">
                                {{ $galeriList->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
