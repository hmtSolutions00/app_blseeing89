@extends('panel.layout.admin')

@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Edit Subkategori Produk</h1>
                    <div class="text-15 text-light-1">Perbarui data subkategori produk.</div>
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <form action="{{ route('admin-panel.sub_categories.update', $subcategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-xl-10">
                        <div class="text-18 fw-500 mb-10">Data Subkategori</div>
                        <div class="row x-gap-20 y-gap-20">

                            {{-- Kategori Induk --}}
                            <div class="col-12">
                                <div class="form-input">
                                    <select name="product_category_id" required
                                        class="appearance-none bg-transparent border-0 border-b border-dark-1 text-dark-1 text-16 h-50 w-full px-0 focus:outline-none focus:border-blue-1">
                                        <option value="" disabled>-- Pilih Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('product_category_id', $subcategory->product_category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute top-1/2 right-0 -translate-y-1/2 pointer-events-none">
                                        <i class="icon-chevron-down text-16 text-dark-1"></i>
                                    </div>
                                </div>
                                @error('product_category_id')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nama --}}
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="name" required
                                        value="{{ old('name', $subcategory->name) }}">
                                    <label class="lh-1 text-16 text-light-1">Nama Subkategori</label>
                                </div>
                                @error('name')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="col-12">
                                <div class="form-input">
                                    <textarea name="description" rows="5" required>{{ old('description', $subcategory->description) }}</textarea>
                                    <label class="lh-1 text-16 text-light-1">Deskripsi</label>
                                </div>
                                @error('description')
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
                                                    <img id="thumbnail-preview" src="{{ $subcategory->thumbnail_url ?? '#' }}"
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
                                                <img src="{{ asset($subcategory->thumbnail) }}" alt="Thumbnail"
                                                    class="img-ratio rounded-4" id="thumbnailModalTrigger"
                                                    style="cursor: pointer;">
                                            </div>
                                        </div>
                                        <div id="thumbnailModal"
                                            style="display: none; position: fixed; top: 0; left: 0; z-index: 9999; width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.8);"
                                            onclick="closeThumbnailModal()">
                                            <div
                                                style="position: relative; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                                <img src="{{ asset($subcategory->thumbnail) }}" alt="Preview"
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


                      {{-- End Thumbnail --}}


            

                        {{-- Meta --}}
                        <div class="border-top-light mt-30 mb-30"></div>
                        <div class="text-18 fw-500 mb-10">Meta Data</div>
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="meta_keywords"
                                        value="{{ old('meta_keywords', $subcategory->meta_keywords) }}">
                                    <label class="lh-1 text-16 text-light-1">Meta Keywords</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="meta_og_title"
                                        value="{{ old('meta_og_title', $subcategory->meta_og_title) }}">
                                    <label class="lh-1 text-16 text-light-1">OG Title</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">
                                    <textarea name="meta_og_description" rows="3">{{ old('meta_og_description', $subcategory->meta_og_description) }}</textarea>
                                    <label class="lh-1 text-16 text-light-1">OG Description</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="meta_og_type"
                                        value="{{ old('meta_og_type', $subcategory->meta_og_type ?? 'product.subcategory') }}">
                                    <label class="lh-1 text-16 text-light-1">OG Type</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-inline-block pt-30">
                            <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                Perbarui <div class="icon-arrow-top-right ml-15"></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
