@extends('app.layouts.index')

@push('dynamic_tag')
    <title>{{ $category->name }} | Blessing89 Tour Travel</title>
    <meta name="description" content="{{ $category->meta_description }}">
    <meta name="keywords" content="{{ $category->meta_keywords }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $category->meta_og_title }} | Blessing89 Tour Travel">
    <meta property="og:description" content="{{ $category->meta_og_description }}">
   <meta property="og:image" content="{{ asset($category->thumbnail) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{ $category->meta_og_type }}">
    <meta property="og:site_name" content="Blessing89 Tour Travel">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Blessing89Travel">
    <meta name="twitter:title" content="{{ $category->meta_og_title }}| Blessing89 Tour Travel">
    <meta name="twitter:description" content="{{ $category->meta_og_description }}">
    <meta name="twitter:image" content="{{ asset( $category->thumbnail) }}">
@endpush
@push('custom_css')
    <style>
        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* Ukuran lebih besar */
            gap: 24px;
        }

        @media (max-width: 1024px) {
            .category-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .category-card {
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #ffcc00;
            /* kuning keemasan */
            border-radius: 12px;
            text-align: center;
            box-sizing: border-box;
            transition: transform 0.2s ease;
        }

        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .category-card img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 8px;
        }

        .category-card .text-14 {
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }

        .category-card .text-description {
            font-size: 13px;
            color: #555;
            margin-top: 6px;
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .category-card .text-12 {
            font-size: 12px;
            color: #888;
            margin-top: 4px;
        }

        @media (max-width: 576px) {
            .category-card {
                padding: 14px;
            }

            .category-card img {
                height: 100px;
            }

            .category-card .text-14 {
                font-size: 13px;
            }

            .category-card .text-description {
                font-size: 12px;
            }

            .category-card .text-12 {
                font-size: 11px;
            }
        }
    </style>
@endpush

@section('content')
    <section class=" d-flex items-center bg-light-2">
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
                            <div class="">Produk & Layanan</div>
                        </div>
                        <div class="col-auto">
                            <div class="">></div>
                        </div>
                        <div class="col-auto">
                            <div class="text-dark-1">{{ $category->name }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <a href="{{ route('frontend.products.layanan') }}" class="text-14 text-blue-1 underline">Semua Produk &
                        Layanan

                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-10">
        <div class="container">
            <div class="row y-gap-15 justify-between items-center">
                <div class="col-auto">
                    <h1 class="text-30 fw-600 mb-0">{{ $category->name }}</h1>
                </div>
                <div class="col-auto">
                    <button class="button px-15 py-10 -blue-1" onclick="sharePage()">
                        <i class="icon-share mr-10"></i> Bagikan
                    </button>
                </div>
            </div>

            <div class="row pt-10">
                <div class="col-12">
                    <div class="text-14 text-light-1">{{ $category->description }}</div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="category-grid">
                @foreach ($category->subcategories as $subcategory)
                    <div class="category-card">
                       <a href="{{ route('frontend.products.bySubcategory', ['category_slug' => $category->slug, 'subcategory_slug' => $subcategory->slug]) }}">

                            <img src="{{ $subcategory->thumbnail ? asset($subcategory->thumbnail) : 'https://via.placeholder.com/150' }}"
                                alt="{{ $subcategory->name }}">
                            <div class="text-14 text-dark-1">{{ $subcategory->name }}</div>
                            <div class="text-description">{{ $subcategory->description }}</div>
                            <div class="text-12">{{ $subcategory->products->count() }} produk</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
@push('custom_js')
    <script>
        function sharePage() {
            if (navigator.share) {
                navigator.share({
                        title: document.title,
                        text: 'Lihat halaman ini:',
                        url: window.location.href
                    })
                    .then(() => console.log('Berhasil dibagikan'))
                    .catch((err) => console.log('Gagal membagikan', err));
            } else {
                alert("Fitur 'Bagikan' tidak didukung di browser ini");
            }
        }
    </script>
@endpush
