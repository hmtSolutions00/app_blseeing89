@extends('panel.layout.admin')

@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Tambah Subkategori Produk Baru</h1>
                    <div class="text-15 text-light-1">Gunakan halaman ini untuk menambahkan subkategori produk baru.</div>
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <form action="{{ route('admin-panel.sub_categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-10">
                        <div class="text-18 fw-500 mb-10">Data Subkategori</div>
                        <div class="row x-gap-20 y-gap-20">

                            {{-- Pilih Kategori Induk --}}
                            <div class="col-12">
                                <div class="form-input">

                                    <select name="product_category_id" id="product_category_id" required
                                        class="appearance-none bg-transparent border-0 border-b border-dark-1 text-dark-1 text-16 h-50 w-full px-0 focus:outline-none focus:border-blue-1">
                                        <option value="" disabled {{ old('product_category_id') ? '' : 'selected' }}>
                                            -- Pilih Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
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
                            {{-- Nama Subkategori --}}
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="name" required value="{{ old('name') }}">
                                    <label class="lh-1 text-16 text-light-1">Nama Subkategori</label>
                                </div>
                                @error('name')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="col-12">
                                <div class="form-input">
                                    <textarea name="description" rows="5" required>{{ old('description') }}</textarea>
                                    <label class="lh-1 text-16 text-light-1">Deskripsi</label>
                                </div>
                                @error('description')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>

                        {{-- Thumbnail --}}
                        <div class="mt-30">
                            <div class="fw-500">Thumbnail Subkategori</div>
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
                                            <img id="thumbnail-preview" src="#" alt="Thumbnail Preview"
                                                class="img-ratio rounded-4" style="display: none;">
                                        </div>
                                        <div class="text-center mt-10 text-14 text-light-1">PNG/JPG maksimal 800px</div>
                                    </div>
                                    @error('thumbnail')
                                        <div class="text-red-1 mt-5">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Meta Data --}}
                        <div class="border-top-light mt-30 mb-30"></div>
                        <div class="text-18 fw-500 mb-10">Meta Data</div>
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}">
                                    <label class="lh-1 text-16 text-light-1">Meta Keywords (pisahkan dengan koma)</label>
                                </div>
                                @error('meta_keywords')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="meta_og_title" value="{{ old('meta_og_title') }}">
                                    <label class="lh-1 text-16 text-light-1">OG Title</label>
                                </div>
                                @error('meta_og_title')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-input">
                                    <textarea name="meta_og_description" rows="3">{{ old('meta_og_description') }}</textarea>
                                    <label class="lh-1 text-16 text-light-1">OG Description</label>
                                </div>
                                @error('meta_og_description')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="meta_og_type"
                                        value="{{ old('meta_og_type', 'product.subcategory') }}">
                                    <label class="lh-1 text-16 text-light-1">OG Type</label>
                                </div>
                                @error('meta_og_type')
                                    <div class="text-red-1 mt-5">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-inline-block pt-30">
                            <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                                Simpan <div class="icon-arrow-top-right ml-15"></div>
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
                    preview.src = "";
                    preview.style.display = 'none';
                }
            });
        </script>
    @endpush
@endsection
