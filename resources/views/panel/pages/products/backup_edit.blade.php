@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Edit Produk</h1>
                <div class="text-15 text-light-1">Gunakan halaman ini untuk memperbarui produk yang sudah ada.</div>
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

            <form action="{{ route('admin-panel.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- === Informasi Dasar === --}}
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Informasi Dasar Produk</div>
                    <div class="row x-gap-20 y-gap-20">
                        {{-- Kategori --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <select name="product_category_id" id="product_category_id" class="form-control">
                                    <option value="" disabled>-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->subcategory->product_category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Subkategori --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <select name="product_subcategory_id" id="product_subcategory_id" class="form-control">
                                    <option value="">-- Pilih Sub Kategori --</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->product_subcategory_id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Nama Produk --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="name" value="{{ old('name', $product->name) }}">
                                <label>Nama Produk</label>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="price_start" value="{{ old('price_start', $product->price_start) }}">
                                <label>Harga Mulai Dari</label>
                            </div>
                        </div>

                        {{-- Masa Berlaku --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="masa_berlaku" value="{{ old('masa_berlaku', $product->masa_berlaku) }}">
                                <label>Masa Berlaku</label>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                                <label>Deskripsi Singkat Produk</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- === GAMBAR === --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Gambar & Galeri</div>
                    <div class="row">
                        {{-- Thumbnail --}}
                        <div class="col-md-6">
                            <label>Thumbnail (Gambar Utama)</label>
                            <div class="form-input">
                                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            </div>
                            @if ($product->thumbnail)
                                <div class="mt-10">
                                    <img src="{{ asset($product->thumbnail) }}" style="max-height: 100px;" class="rounded-4">
                                </div>
                            @endif
                        </div>

                        {{-- Galeri --}}
                        <div class="col-md-6">
                            <label>Galeri Gambar (Maks. 5)</label>
                            <div class="form-input">
                                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                            </div>
                             <span>Gambar Saat ini</span>
                            <div class="d-flex flex-wrap gap-3 mt-15">
                               
                                @if (is_array($product->images))
                                    @foreach ($product->images as $image)
                                        <div class="position-relative gallery-image-wrapper" data-filename="{{ $image }}" style="margin: 5px;">
                                            <input type="hidden" name="old_images[]" value="{{ $image }}">
                                            <img src="{{ asset($image) }}" style="max-height: 100px;" class="rounded-4">
                                            <button type="button" class="btn btn-danger btn-sm btn-remove-image" style="position: absolute; top: -8px; right: -8px; border-radius: 50%; width: 24px; height: 24px; padding: 0; line-height: 20px; text-align: center;">
                                                &times;
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            {{-- Tampilkan gambar baru yang baru pilih disini --}}
                            <span>Gambar  Baru</span>
                            <div id="images-preview-container" class="d-flex flex-wrap gap-3 mt-15"></div>
                        </div>
                    </div>
                </div>

                {{-- === FULL DETAIL === --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-12">
                    <div class="form-input">
                        <label>Detail Produk Lengkap</label>
                        <textarea name="full_detail" id="full_detail">{{ old('full_detail', $product->full_detail) }}</textarea>
                    </div>
                </div>

                {{-- === META DATA === --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Meta Data (Untuk SEO)</div>
                    <div class="row x-gap-20 y-gap-20">
                        @php
                            $metaFields = [
                                'slug' => 'Slug (URL)',
                                'meta_description' => 'Meta Description',
                                'meta_keywords' => 'Meta Keywords',
                                'meta_og_title' => 'OG Title',
                                'meta_og_description' => 'OG Description',
                                'meta_og_type' => 'OG Type',
                            ];
                        @endphp

                        @foreach ($metaFields as $name => $label)
                            <div class="col-12">
                                <div class="form-input">
                                    @if (Str::contains($name, 'description'))
                                        <textarea name="{{ $name }}">{{ old($name, $product->$name) }}</textarea>
                                    @else
                                        <input type="text" name="{{ $name }}" value="{{ old($name, $product->$name) }}">
                                    @endif
                                    <label>{{ $label }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-inline-block pt-30">
                    <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                        Perbarui Produk <div class="icon-arrow-top-right ml-15"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi hanya sekali agar tidak muncul dobel
    if (!window.editorInitialized) {
        ClassicEditor.create(document.querySelector('#full_detail')).catch(console.error);
        window.editorInitialized = true;
    }

    const categorySelect = document.getElementById('product_category_id');
    const subcategorySelect = document.getElementById('product_subcategory_id');

    categorySelect.addEventListener('change', function () {
        const categoryId = this.value;
        subcategorySelect.innerHTML = '<option value="">Memuat...</option>';
        subcategorySelect.disabled = true;

        fetch(`{{ url('admin-panel/get-subcategories') }}/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                let options = '<option value="">-- Pilih Sub Kategori --</option>';
                data.forEach(item => {
                    options += `<option value="${item.id}">${item.name}</option>`;
                });
                subcategorySelect.innerHTML = options;
                subcategorySelect.disabled = false;
            })
            .catch(() => {
                subcategorySelect.innerHTML = '<option value="">Gagal memuat data</option>';
            });
    });

    document.querySelectorAll('.btn-remove-image').forEach(btn => {
        btn.addEventListener('click', function () {
            const wrapper = this.closest('.gallery-image-wrapper');
            wrapper.remove();
        });
    });
});
</script>
@endpush
