@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Tambah Produk Baru</h1>
                <div class="text-15 text-light-1">Gunakan halaman ini untuk menambahkan produk tour & travel baru.</div>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            @if ($errors->any())
                <div class="py-15 px-20 rounded-4 bg-red-1 text-white mb-20">
                    <strong class="fw-500">Oops! Terjadi beberapa kesalahan:</strong>
                    <ul class="mt-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin-panel.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- INFORMASI DASAR PRODUK --}}
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Informasi Dasar Produk</div>
                    <div class="row x-gap-20 y-gap-20">
                        {{-- Pilih Kategori --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <select name="product_category_id" id="product_category_id" required class="form-control">
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Pilih Sub Kategori (Dinamis) --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <select name="product_subcategory_id" id="product_subcategory_id" required class="form-control" disabled>
                                    <option value="" disabled selected>-- Pilih Kategori Terlebih Dahulu --</option>
                                </select>
                            </div>
                        </div>

                        {{-- Nama Produk --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="name" required value="{{ old('name') }}">
                                <label class="lh-1 text-16 text-light-1">Nama Produk</label>
                            </div>
                        </div>
                        
                        {{-- Harga Mulai --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="number" name="price_start" required value="{{ old('price_start') }}">
                                <label class="lh-1 text-16 text-light-1">Harga Mulai (Contoh: 1500000)</label>
                            </div>
                        </div>

                        {{-- Masa Berlaku --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="masa_berlaku" value="{{ old('masa_berlaku') }}">
                                <label class="lh-1 text-16 text-light-1">Masa Berlaku (Contoh: Sampai 31 Des 2025)</label>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="description" rows="5" required>{{ old('description') }}</textarea>
                                <label class="lh-1 text-16 text-light-1">Deskripsi Singkat Produk</label>
                            </div>
                        </div>
                    </div>
                </div>
                      {{-- FULL DETAIL --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-12">
                    <div class="form-input">
                        <label>Detail Produk Lengkap</label>
                        <textarea name="full_detail" id="full_detail" class="{{ $errors->has('full_detail') ? 'is-invalid' : '' }}">{{ old('full_detail') }}</textarea>
                        @error('full_detail')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- UPLOAD GAMBAR --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Gambar & Galeri</div>
                    <div class="row">
                        {{-- Thumbnail --}}
                        <div class="col-md-6">
                            <div class="fw-500">Thumbnail (Gambar Utama)</div>
                            <div class="mt-15">
                                <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control" required>
                                <img id="thumbnail-preview" src="#" alt="Thumbnail Preview" class="img-fluid rounded-4 mt-15" style="display: none; max-height: 200px;">
                            </div>
                        </div>
                        {{-- Galeri (Multiple Images) --}}
                        <div class="col-md-6">
                            <div class="fw-500">Galeri Gambar (Maks. 5)</div>
                            <div class="mt-15">
                                <input type="file" name="images[]" id="images" accept="image/*" class="form-control" multiple>
                                <div id="images-preview-container" class="d-flex flex-wrap gap-3 mt-15"></div>
                            </div>
                        </div>
                    </div>
                </div>

                


                {{-- Meta Data SEO --}}
             {{-- Meta Data SEO --}}
<div class="border-top-light mt-30 mb-30"></div>
<div class="col-xl-10">
    <div class="text-18 fw-500 mb-10">Meta Data (Untuk SEO)</div>
    <div class="row x-gap-20 y-gap-20">
        {{-- Slug --}}
        <div class="col-12">
            <div class="form-input">
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}">
                <label for="slug" class="lh-1 text-16 text-light-1">Slug (URL)</label>
            </div>
            <div class="text-13 text-light-1 mt-5">Kosongkan agar dibuat otomatis dari nama produk.</div>
        </div>

        {{-- Meta Description --}}
        <div class="col-12">
            <div class="form-input">
                <textarea name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                <label class="lh-1 text-16 text-light-1">Meta Description</label>
            </div>
        </div>

        {{-- Meta Keywords --}}
        <div class="col-12">
            <div class="form-input">
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}">
                <label class="lh-1 text-16 text-light-1">Meta Keywords (pisahkan dengan koma)</label>
            </div>
        </div>

        {{-- OG Title --}}
        <div class="col-12">
            <div class="form-input">
                <input type="text" name="meta_og_title" value="{{ old('meta_og_title') }}">
                <label class="lh-1 text-16 text-light-1">OG Title</label>
            </div>
        </div>

        {{-- OG Description --}}
        <div class="col-12">
            <div class="form-input">
                <textarea name="meta_og_description" rows="2">{{ old('meta_og_description') }}</textarea>
                <label class="lh-1 text-16 text-light-1">OG Description</label>
            </div>
        </div>

        {{-- OG Type --}}
        <div class="col-md-6">
            <div class="form-input">
                <input type="text" name="meta_og_type" value="{{ old('meta_og_type', 'website') }}">
                <label class="lh-1 text-16 text-light-1">OG Type (default: website)</label>
            </div>
        </div>
    </div>
</div>


                <div class="d-inline-block pt-30">
                    <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                        Simpan Produk <div class="icon-arrow-top-right ml-15"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- TEMPLATE UNTUK DETAIL & SUB-DETAIL (DISEMBUNYIKAN) --}}
<template id="detail-template">
    <div class="detail-item py-20 px-20 rounded-4 border-light mt-20">
        <div class="row y-gap-20 items-center">
            <div class="col">
                <div class="form-input">
                    <input type="text" name="details[__INDEX__][title]" required>
                    <label class="lh-1 text-16 text-light-1">Judul Detail (Contoh: Itinerary Hari Ke-1)</label>
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="button size-40 bg-red-1 text-white" onclick="removeDetail(this)">
                    <i class="icon-trash-2 text-16"></i>
                </button>
            </div>
            <div class="col-12">
                 <div class="form-input">
                    <textarea name="details[__INDEX__][content]" rows="3"></textarea>
                    <label class="lh-1 text-16 text-light-1">Deskripsi Detail (Opsional)</label>
                </div>
            </div>
        </div>
        <div class="subdetails-container mt-20 ml-30">
            {{-- Kontainer untuk sub-detail dinamis --}}
        </div>
        <button type="button" class="button h-30 px-20 -dark-1 bg-light-2 text-dark-1 mt-15" onclick="addSubDetail(this, __INDEX__)">
            <i class="icon-plus text-12 mr-10"></i> Tambah Sub-Detail
        </button>
    </div>
</template>

<template id="subdetail-template">
    <div class="subdetail-item d-flex items-center mt-15">
        <div class="form-input flex-grow-1">
            <input type="text" name="details[__DETAIL_INDEX__][subdetails][__SUB_INDEX__][content]" required>
            <label class="lh-1 text-16 text-light-1">Isi Sub-Detail</label>
        </div>
        <div class="ml-10">
             <button type="button" class="button size-30 bg-red-1 text-white" onclick="removeSubDetail(this)">
                <i class="icon-trash-2 text-12"></i>
            </button>
        </div>
    </div>
</template>

@endsection

@push('custom_js')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Inisialisasi CKEditor
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#full_detail'))
            .catch(error => {
                console.error('CKEditor error:', error);
            });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('product_category_id');
    const subcategorySelect = document.getElementById('product_subcategory_id');

    // --- 1. AJAX UNTUK SUBKATEGORI DINAMIS ---
    categorySelect.addEventListener('change', function() {
        const categoryId = this.value;
        subcategorySelect.innerHTML = '<option value="">Memuat...</option>';
        subcategorySelect.disabled = true;

        if (!categoryId) {
            subcategorySelect.innerHTML = '<option value="">-- Pilih Kategori Terlebih Dahulu --</option>';
            return;
        }

        fetch(`{{ url('admin-panel/get-subcategories') }}/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                let options = '<option value="" disabled selected>-- Pilih Sub Kategori --</option>';
                data.forEach(function(subcategory) {
                    options += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                });
                subcategorySelect.innerHTML = options;
                subcategorySelect.disabled = false;
            })
            .catch(error => {
                console.error('Error fetching subcategories:', error);
                subcategorySelect.innerHTML = '<option value="">Gagal memuat data</option>';
            });
    });

    // --- 2. JAVASCRIPT UNTUK PREVIEW GAMBAR ---
    // Preview Thumbnail
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const preview = document.getElementById('thumbnail-preview');
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Preview Multiple Images
    document.getElementById('images').addEventListener('change', function(e) {
        const container = document.getElementById('images-preview-container');
        container.innerHTML = ''; // Kosongkan preview lama
        if (e.target.files.length > 5) {
            alert('Anda hanya bisa mengupload maksimal 5 gambar.');
            e.target.value = ""; // Reset input file
            return;
        }
        Array.from(e.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxHeight = '100px';
                img.style.maxWidth = '100px';
                img.classList.add('rounded-4', 'object-cover');
                container.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });
});


</script>
@endpush