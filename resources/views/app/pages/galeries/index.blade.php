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
                                <div class="col-6 col-lg-2 col-sm-4 mb-15">
                                    <div class="blogCard__image">
                                        <div class="rounded-8">
                                            <a href="/{{ $galeri->path_items }}">
                                                @if ($galeri->jenis_items == 'Gambar')
                                                    <img class="js-lazy" src="{{ asset($galeri->path_items) }}"
                                                        data-src="{{ asset($galeri->path_items) }}"
                                                        style="max-height: 200px;min-height: 200px;width: -webkit-fill-available;">
                                                @else
                                                    <video class="js-lazy" controls
                                                        style="max-height: 200px;min-height: 200px;width: -webkit-fill-available;">
                                                        <source src="{{ $galeri->path_items }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    @if ($galeri->jenis_items == 'Gambar')
                                        <div class="pt-10">
                                        @else
                                            <div class="pt-0">
                                    @endif
                                    <div class="text-light-1 text-15 lh-14 mt-5">
                                        {{ \Carbon\Carbon::parse($galeri->created_at)->translatedFormat('F d, Y') }}
                                    </div>
                                </div>
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
