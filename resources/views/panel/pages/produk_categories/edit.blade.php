@extends('panel.layout.admin')

@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Edit Kategori Produk (Jasa & Layanan)</h1>
                    <div class="text-15 text-light-1">Halaman ini digunakan untuk mengedit data kategori produk (jasa &
                        layanan).</div>
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                {{-- Form Edit --}}
                <form action="{{ route('admin-panel.categories.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data" class="tabs -underline-2 js-tabs">
                    @csrf
                    @method('PUT')

                    <div class="tabs__content pt-30 js-tabs-content">
                        <div class="tabs__pane -tab-item-1 is-tab-el-active">
                            <div class="col-xl-10">
                                <div class="text-18 fw-500 mb-10">Data Kategori</div>
                                <div class="row x-gap-20 y-gap-20">
                                    {{-- Nama --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="name" id="name" required
                                                value="{{ old('name', $category->name) }}">
                                            <label for="name" class="lh-1 text-16 text-light-1">Nama Kategori</label>
                                        </div>
                                        @error('name')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Deskripsi --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <textarea name="description" id="description" rows="5" required>{{ old('description', $category->description) }}</textarea>
                                            <label for="description" class="lh-1 text-16 text-light-1">Keterangan</label>
                                        </div>
                                        @error('description')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Slug --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="slug" id="slug"
                                                value="{{ old('slug', $category->slug) }}" data-manual="true">
                                            <label for="slug" class="lh-1 text-16 text-light-1">Slug (URL Friendly
                                                Name)</label>
                                        </div>
                                        <div class="text-13 text-light-1 mt-5">Kosongkan jika ingin dibuat otomatis dari
                                            Nama Kategori.</div>
                                        @error('slug')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Thumbnail --}}
                                <div class="mt-30">
                                    <div class="fw-500">Thumbnail Kategori</div>
                                    <div class="row x-gap-20 y-gap-20 pt-15">
                                        <div class="col-auto">
                                            <div class="w-200">
                                                <div class="d-flex ratio ratio-1:1">
                                                    <label for="thumbnail"
                                                        class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1"
                                                        style="cursor: pointer;">
                                                        <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                        <div class="text-blue-1 fw-500">Masukkan Gambar</div>
                                                    </label>
                                                    <input type="file" name="thumbnail" id="thumbnail"
                                                        accept="image/png, image/jpeg" style="display: none;">
                                                    {{-- Preview Thumbnail --}}
                                                    <img id="thumbnail-preview" src="{{ $category->thumbnail_url ?? '#' }}"
                                                        alt="Thumbnail Preview" class="img-ratio rounded-4"
                                                        @if (!$category->thumbnail_url) style="display: none;" @endif>
                                                </div>
                                                <div class="text-center mt-10 text-14 text-light-1">Masukkan Gambar dengan
                                                    Ekstensi PNG dan JPG</div>
                                            </div>
                                            @error('thumbnail')
                                                <div class="text-red-1 mt-5">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- Imeg Preview --}}
                                        <div class="col-auto">
                                            <div class="d-flex ratio ratio-1:1 w-200 cursor-pointer">
                                                <img src="{{ asset($category->thumbnail) }}" alt="Thumbnail"
                                                    class="img-ratio rounded-4" id="thumbnailModalTrigger"
                                                    style="cursor: pointer;">
                                            </div>
                                        </div>
                                        <div id="thumbnailModal"
                                            style="display: none; position: fixed; top: 0; left: 0; z-index: 9999; width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.8);"
                                            onclick="closeThumbnailModal()">
                                            <div
                                                style="position: relative; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                                <img src="{{ asset($category->thumbnail) }}" alt="Preview"
                                                    style="max-width: 90vw; max-height: 90vh; border-radius: 10px;">
                                                <button type="button" onclick="closeThumbnailModal()"
                                                    style="position: absolute; top: 20px; right: 20px; background-color: #f44336; color: white; border: none; padding: 10px 15px; border-radius: 4px; font-size: 18px; cursor: pointer;">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>

                                        {{-- End Preview --}}
                                    </div>
                                </div>

                                <div class="border-top-light mt-30 mb-30"></div>

                                {{-- Meta --}}
                                <div class="text-18 fw-500 mb-10">Meta Data (Untuk SEO dan Sosial Media)</div>
                                <div class="row x-gap-20 y-gap-20">
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <textarea name="meta_description" id="meta_description" rows="3">{{ old('meta_description', $category->meta_description) }}</textarea>
                                            <label for="meta_description" class="lh-1 text-16 text-light-1">Meta
                                                Description</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="meta_keywords" id="meta_keywords"
                                                value="{{ old('meta_keywords', $category->meta_keywords) }}">
                                            <label for="meta_keywords" class="lh-1 text-16 text-light-1">Meta
                                                Keywords</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="meta_og_title" id="meta_og_title"
                                                value="{{ old('meta_og_title', $category->meta_og_title) }}">
                                            <label for="meta_og_title" class="lh-1 text-16 text-light-1">OG Title</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-input ">
                                            <textarea name="meta_og_description" id="meta_og_description" rows="3">{{ old('meta_og_description', $category->meta_og_description) }}</textarea>
                                            <label for="meta_og_description" class="lh-1 text-16 text-light-1">OG
                                                Description</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="meta_og_type" id="meta_og_type"
                                                value="{{ old('meta_og_type', $category->meta_og_type ?? 'website') }}">
                                            <label for="meta_og_type" class="lh-1 text-16 text-light-1">OG Type</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-inline-block pt-30">
                                <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                    Simpan Perubahan <div class="icon-arrow-top-right ml-15"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Footer tetap sama --}}
            @include('panel.component.footer')
        </div>
    </div>

    {{-- Custom JS --}}
    @push('custom_js')
        <script>
            document.getElementById('thumbnail').addEventListener('change', function(e) {
                const preview = document.getElementById('thumbnail-preview');
                const file = e.target.files[0];
                const reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "{{ $category->thumbnail_url ?? '#' }}";
                    preview.style.display = '{{ $category->thumbnail_url ? 'block' : 'none' }}';
                }
            });
        </script>
        <script>
            document.getElementById('thumbnailModalTrigger').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('thumbnailModal').style.display = 'block';
            });

            function closeThumbnailModal() {
                document.getElementById('thumbnailModal').style.display = 'none';
            }
        </script>
    @endpush
@endsection
