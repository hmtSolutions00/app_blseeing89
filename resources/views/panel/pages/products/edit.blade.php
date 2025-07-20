@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Edit Produk: {{ $product->name }}</h1>
                <div class="text-15 text-light-1">Gunakan halaman ini untuk mengubah data produk.</div>
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

            <form action="{{ route('admin-panel.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="form-edit-produk">
                @csrf
                @method('PUT')
                
                {{-- INFORMASI DASAR PRODUK --}}
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Informasi Dasar Produk</div>
                    <div class="row x-gap-20 y-gap-20">
                        {{-- Pilih Kategori --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <select name="product_category_id" id="product_category_id" required class="form-control">
                                    <option value="" disabled>-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('product_category_id', $product->subcategory->product_category_id) == $category->id ? 'selected' : '' }}>
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
                                    {{-- Opsi sub-kategori akan diisi oleh JavaScript --}}
                                </select>
                            </div>
                        </div>

                        {{-- Nama Produk --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="name" required value="{{ old('name', $product->name) }}">
                                <label class="lh-1 text-16 text-light-1">Nama Produk</label>
                            </div>
                        </div>
                        
                        {{-- Harga Mulai --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="price_start" required value="{{ old('price_start', $product->price_start) }}">
                                <label class="lh-1 text-16 text-light-1">Harga Mulai </label>
                            </div>
                        </div>

                        {{-- Masa Berlaku --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="masa_berlaku" value="{{ old('masa_berlaku', $product->masa_berlaku) }}">
                                <label class="lh-1 text-16 text-light-1">Masa Berlaku</label>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
                                <label class="lh-1 text-16 text-light-1">Deskripsi Singkat Produk</label>
                            </div>
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
                {{-- UPLOAD GAMBAR --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-12">
                    <div class="text-18 fw-500 mb-10">Gambar & Galeri</div>
                    <div class="row">
                        {{-- Thumbnail --}}
                        <div class="col-md-6">
                            <div class="fw-500">Thumbnail (Gambar Utama)</div>
                            <div class="mt-15">
                                <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control">
                                <div class="text-13 text-light-1 mt-5">Kosongkan jika tidak ingin mengubah thumbnail.</div>
                                <img id="thumbnail-preview" src="{{ $product->thumbnail ? asset($product->thumbnail) : '#' }}" alt="Thumbnail Preview" class="img-fluid rounded-4 mt-15" style="{{ $product->thumbnail ? '' : 'display: none;' }} max-height: 200px; object-fit: cover;">
                            </div>
                        </div>
                     {{-- Galeri (Multiple Images) --}}
<div class="col-md-6">
    <div class="fw-500">Galeri Gambar (Maks. 5)</div>
    <div class="mt-15">
        <div id="existing-images-container" class="d-flex flex-wrap gap-3 mb-15">
            @if(is_array($product->images))
                @foreach($product->images as $image)
                <div class="d-inline-block position-relative" id="image-{{ md5($image) }}">
                    <img src="{{ asset($image) }}" class="rounded-4" style="height: 100px; width: 100px; object-fit: cover;">
                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 rounded-circle" style="line-height:1; padding: 4px 8px;" onclick="removeExistingImage('{{ $image }}', '{{ md5($image) }}')">&times;</button>
                </div>
                @endforeach
            @endif
        </div>
            {{-- Logicnya adalah --}}

        {{-- Input hidden untuk kirim gambar yang masih tersisa --}}
        <input type="hidden" name="existing_images_json" id="existing_images_json" value="{{ json_encode($product->images ?? []) }}">

        {{-- Upload Gambar Baru --}}
        <input type="file" name="images[]" id="images" accept="image/*" class="form-control" multiple>
        <div id="images-preview-container" class="d-flex flex-wrap gap-3 mt-15"></div>

        <div class="text-13 text-light-1 mt-5">Total maksimal 5 gambar (termasuk yang sudah ada).</div>
    </div>
</div>
                    </div>
                </div>

                {{-- Meta Data SEO (Lengkap) --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Meta Data (Untuk SEO)</div>
                    <div class="row x-gap-20 y-gap-20">
                        {{-- Slug --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}">
                                <label for="slug" class="lh-1 text-16 text-light-1">Slug (URL)</label>
                            </div>
                            <div class="text-13 text-light-1 mt-5">Kosongkan agar dibuat otomatis dari nama produk.</div>
                        </div>

                        {{-- Meta Description --}}
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="meta_description" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                                <label class="lh-1 text-16 text-light-1">Meta Description</label>
                            </div>
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                                <label class="lh-1 text-16 text-light-1">Meta Keywords (pisahkan dengan koma)</label>
                            </div>
                        </div>

                        {{-- OG Title --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="meta_og_title" value="{{ old('meta_og_title', $product->meta_og_title) }}">
                                <label class="lh-1 text-16 text-light-1">OG Title</label>
                            </div>
                        </div>

                        {{-- OG Description --}}
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="meta_og_description" rows="2">{{ old('meta_og_description', $product->meta_og_description) }}</textarea>
                                <label class="lh-1 text-16 text-light-1">OG Description</label>
                            </div>
                        </div>

                        {{-- OG Type --}}
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="meta_og_type" value="{{ old('meta_og_type', $product->meta_og_type ?? 'website') }}">
                                <label class="lh-1 text-16 text-light-1">OG Type (default: website)</label>
                            </div>
                        </div>
                    </div>
                </div>
@foreach(request()->all() as $key => $val)
    <p><strong>{{ $key }}:</strong> {{ is_array($val) ? implode(', ', $val) : $val }}</p>
@endforeach
                <div class="d-inline-block pt-30">
                    <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                        Update Produk <div class="icon-arrow-top-right ml-15"></div>
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
function removeExistingImage(imagePath, imageId) {
    const imageDiv = document.getElementById('image-' + imageId);
    if (imageDiv) {
        imageDiv.remove();
        console.log('Removed image path:', imagePath);

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'images_to_remove[]';
        input.value = imagePath;

        const form = document.getElementById('form-edit-produk');
        if (form) {
            form.appendChild(input);
            console.log('Input hidden akan ditambahkan ke form...');
        } else {
            console.error('Form tidak ditemukan!');
        }
    }
}

// Logic setelah DOM siap
document.addEventListener('DOMContentLoaded', function() {
    // Handle subkategori dinamis
    const categorySelect = document.getElementById('product_category_id');
    const subcategorySelect = document.getElementById('product_subcategory_id');

    function fetchAndPopulateSubcategories(categoryId, selectedSubId = null) {
        if (!categoryId) {
            subcategorySelect.innerHTML = '<option value="">-- Pilih Kategori Terlebih Dahulu --</option>';
            subcategorySelect.disabled = true;
            return;
        }

        subcategorySelect.innerHTML = '<option value="">Memuat...</option>';
        subcategorySelect.disabled = true;

        fetch(`{{ url('admin-panel/get-subcategories') }}/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                let options = '<option value="" disabled>-- Pilih Sub Kategori --</option>';
                data.forEach(function(subcategory) {
                    const isSelected = selectedSubId && subcategory.id == selectedSubId ? 'selected' : '';
                    options += `<option value="${subcategory.id}" ${isSelected}>${subcategory.name}</option>`;
                });
                subcategorySelect.innerHTML = options;
                subcategorySelect.disabled = false;
            })
            .catch(error => {
                console.error('Gagal mengambil subkategori:', error);
                subcategorySelect.innerHTML = '<option value="">Gagal memuat</option>';
                subcategorySelect.disabled = false;
            });
    }

    categorySelect.addEventListener('change', function() {
        fetchAndPopulateSubcategories(this.value);
    });

    // Inisialisasi subkategori jika halaman load
    const initialCategoryId = categorySelect.value;
    const initialSubcategoryId = '{{ old('product_subcategory_id', $product->product_subcategory_id) }}';
    if (initialCategoryId) {
        fetchAndPopulateSubcategories(initialCategoryId, initialSubcategoryId);
    }

    // Preview Thumbnail
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const preview = document.getElementById('thumbnail-preview');
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Handle preview gambar multi dan batasi max 5 total gambar
    const imageInput = document.getElementById('images');
    const previewContainer = document.getElementById('images-preview-container');
    const existingContainer = document.getElementById('existing-images-container');

    imageInput.addEventListener('change', function(e) {
        previewContainer.innerHTML = ''; // reset preview

        const existingCount = existingContainer.querySelectorAll('img').length;
        const newCount = e.target.files.length;
        const totalCount = existingCount + newCount;

        if (totalCount > 5) {
            alert(`Total gambar tidak boleh lebih dari 5. Saat ini sudah ada ${existingCount} gambar.`);
            e.target.value = "";
            return;
        }

        Array.from(e.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(ev) {
                const img = document.createElement('img');
                img.src = ev.target.result;
                img.style.height = '100px';
                img.style.width = '100px';
                img.classList.add('rounded-4', 'object-cover', 'me-2');
                previewContainer.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });
});
</script>
@endpush
