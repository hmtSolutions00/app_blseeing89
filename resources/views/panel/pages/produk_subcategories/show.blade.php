@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Detail Subkategori Produk</h1>
                <div class="text-15 text-light-1">Lihat detail informasi subkategori produk.</div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin-panel.sub_categories.edit', $subcategory->id) }}" class="button px-20 h-40 bg-blue-1 text-white">Ubah Data</a>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="col-xl-10">
                <div class="text-18 fw-500 mb-10">Data Subkategori</div>
                <div class="row x-gap-20 y-gap-20">

                    {{-- Kategori Induk --}}
                    <div class="col-12">
                        <div class="form-input">
                            <select name="product_category_id" disabled
                                class="appearance-none bg-transparent border-0 border-b border-dark-1 text-dark-1 text-16 h-50 w-full px-0 focus:outline-none">
                                <option value="" disabled>-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $subcategory->product_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Nama --}}
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">Nama Subkategori</label>
                        <div class="form-input">
                            <input type="text" name="name" value="{{ $subcategory->name }}" disabled>
                            
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">Deskripsi</label>
                        <div class="form-input">
                            <textarea name="description" rows="5" disabled>{{ $subcategory->description }}</textarea>
                            
                        </div>
                    </div>
                </div>

                {{-- Thumbnail --}}
                <div class="mt-30">
                    <div class="fw-500">Thumbnail Subkategori</div>
                    <div class="row x-gap-20 y-gap-20 pt-15">
                        <div class="col-auto">
                            <div class="w-200">
                                <div class="d-flex ratio ratio-1:1">
                                    <img src="{{asset( $subcategory->thumbnail) ?? '#' }}" alt="Thumbnail Preview"
                                        class="img-ratio rounded-4"
                                        style="{{ asset($subcategory->thumbnail) ? '' : 'display: none;' }}">
                                </div>
                                <div class="text-center mt-10 text-14 text-light-1">PNG/JPG maksimal 800px</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Meta --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="text-18 fw-500 mb-10">Meta Data</div>
                <div class="row x-gap-20 y-gap-20">
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">Meta Keywords</label>
                        <div class="form-input">
                            <input type="text" name="meta_keywords" value="{{ $subcategory->meta_keywords }}" disabled>
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">OG Title</label>
                        <div class="form-input">
                            <input type="text" name="meta_og_title" value="{{ $subcategory->meta_og_title }}" disabled>
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">OG Description</label>
                        <div class="form-input">
                            <textarea name="meta_og_description" rows="3" disabled>{{ $subcategory->meta_og_description }}</textarea>
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">OG Type</label>
                        <div class="form-input">
                            <input type="text" name="meta_og_type" value="{{ $subcategory->meta_og_type ?? 'product.subcategory' }}" disabled>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection