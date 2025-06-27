<!-- view: resources/views/panel/pages/product/show.blade.php -->
@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Detail Produk: {{ $product->name }}</h1>
                <div class="text-15 text-light-1">Lihat informasi lengkap produk ini.</div>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <form>
                @csrf

                {{-- INFORMASI DASAR PRODUK --}}
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Informasi Dasar Produk</div>
                    <div class="row x-gap-20 y-gap-20">

                        <div class="col-md-6">
                             <label class="lh-1 text-16 text-light-1">Kategori</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->subcategory->category->name }}">
                               
                            </div>
                        </div>

                        <div class="col-md-6">
                              <label class="lh-1 text-16 text-light-1">Sub Kategori</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->subcategory->name }}">
                              
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="lh-1 text-16 text-light-1">Nama Produk</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->name }}">
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="lh-1 text-16 text-light-1">Harga Mulai</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ number_format($product->price_start, 0, ',', '.') }}">
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="lh-1 text-16 text-light-1">Masa Berlaku</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->masa_berlaku }}">
                                
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="lh-1 text-16 text-light-1">Deskripsi</label>
                            <div class="form-input">
                                <textarea rows="4" disabled>{{ $product->description }}</textarea>
                                
                            </div>
                        </div>
                    </div>
                </div>

                {{-- GAMBAR & THUMBNAIL --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-12">
                    <div class="text-18 fw-500 mb-10">Gambar & Galeri</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fw-500">Thumbnail</div>
                            @if ($product->thumbnail)
                                <img src="{{ asset($product->thumbnail) }}" class="img-fluid rounded-4 mt-15" style="max-height: 200px; object-fit: cover;">
                            @else
                                <div class="text-light-1 mt-10">Tidak ada thumbnail.</div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="fw-500">Galeri Gambar</div>
                            <div class="d-flex flex-wrap gap-3 mt-15">
                                @if(is_array($product->images))
                                    @foreach($product->images as $image)
                                        <img src="{{ asset($image) }}" style="height: 100px; width: 100px; object-fit: cover;" class="rounded-4">
                                    @endforeach
                                @else
                                    <div class="text-light-1">Tidak ada gambar.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DETAIL PRODUK --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-12">
                    <div class="text-18 fw-500 mb-20">Detail Produk</div>
                    @foreach($product->details as $detail)
                        <div class="border rounded-4 p-20 mb-20">
                            <div class="text-16 fw-600 mb-10">{{ $detail->title }}</div>
                            @if($detail->content)
                                <p class="mb-10">{{ $detail->content }}</p>
                            @endif
                            @if($detail->subDetails->count())
                                <ul class="list-disc ml-20">
                                    @foreach($detail->subDetails as $sub)
                                        <li>{{ $sub->content }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>

                {{-- META SEO --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Meta Data SEO</div>
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">
                            <label class="lh-1 text-16 text-light-1">Slug</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->slug }}">
                                
                            </div>
                        </div>
                        <div class="col-12">
                              <label class="lh-1 text-16 text-light-1">Meta Description</label>
                            <div class="form-input">
                                <textarea rows="2" disabled>{{ $product->meta_description }}</textarea>
                              
                            </div>
                        </div>
                        <div class="col-12">
                               <label class="lh-1 text-16 text-light-1">Meta Keywords</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->meta_keywords }}">
                             
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="lh-1 text-16 text-light-1">OG Title</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->meta_og_title }}">
                                
                            </div>
                        </div>
                        <div class="col-12">
                             <label class="lh-1 text-16 text-light-1">OG Description</label>
                            <div class="form-input">
                                <textarea rows="2" disabled>{{ $product->meta_og_description }}</textarea>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lh-1 text-16 text-light-1">OG Type</label>
                            <div class="form-input">
                                <input type="text" disabled value="{{ $product->meta_og_type }}">
                                
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tombol Edit --}}
                <div class="d-inline-block pt-30">
                    <a href="{{ route('admin-panel.products.edit', $product->id) }}" class="button h-50 px-24 -dark-1 bg-yellow-3 text-dark-1">
                        Edit Produk <div class="icon-edit ml-15"></div>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
