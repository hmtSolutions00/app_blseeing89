@extends('panel.layout.admin')

@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Tambah Kategori Produk (Jasa & Layanan) Baru</h1>
                    <div class="text-15 text-light-1">Halaman ini digunakan untuk menambah data kategori produk (jasa & layanan) baru, apabila blessing89 memiliki produk baru.</div>
                </div>
                <div class="col-auto">
                    {{-- Anda bisa menambahkan tombol kembali atau tindakan lain di sini jika diperlukan --}}
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                {{-- Form dimulai di sini --}}
                <form action="{{ route('admin-panel.categories.store') }}" method="POST" enctype="multipart/form-data" class="tabs -underline-2 js-tabs">
                    @csrf {{-- Penting untuk keamanan Laravel --}}

                    <div class="tabs__content pt-30 js-tabs-content">
                        <div class="tabs__pane -tab-item-1 is-tab-el-active">
                            <div class="col-xl-10">
                                <div class="text-18 fw-500 mb-10">Data Kategori</div>
                                <div class="row x-gap-20 y-gap-20">
                                    {{-- ini label prodduk --}}
        {{-- Label Produk --}}
<div class="col-12">
  <label class="lh-1 text-16 text-light-1 d-block mb-10">Label Kategori Produk</label>

  <div class="select js-select js-liveSearch" data-select-value="">
    <button class="select__button js-button" type="button">
      <span class="js-button-title">
        {{ old('label') === 'pendukung_tour' ? 'Produk Pendukung Tour' : (old('label') === 'tour' ? 'Produk Tour' : 'Pilih Label Kategori Produk Anda') }}
      </span>
      <i class="select__icon" data-feather="chevron-down"></i>
    </button>

    <div class="select__dropdown js-dropdown">
      <input type="text" placeholder="Search" class="select__search js-search">
      <div class="select__options js-options">
        <div class="select__options__button" data-value="tour">Produk Tour</div>
        <div class="select__options__button" data-value="pendukung_tour">Produk Pendukung Tour</div>
      </div>
    </div>
  </div>

  {{-- Hidden input untuk dikirim ke server --}}
  <input type="hidden" name="label" id="label" value="{{ old('label') }}">

  @error('label')
    <div class="text-red-1 mt-5">{{ $message }}</div>
  @enderror
</div>

                                    {{-- End label produk --}}

                                    
                                    {{-- Nama Kategori --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="name" id="name" required value="{{ old('name') }}">
                                            <label for="name" class="lh-1 text-16 text-light-1">Nama Kategori</label>
                                        </div>
                                        @error('name')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Keterangan / Deskripsi --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <textarea name="description" id="description" rows="5" required>{{ old('description') }}</textarea>
                                            <label for="description" class="lh-1 text-16 text-light-1">Keterangan</label>
                                        </div>
                                        @error('description')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Slug (Otomatis atau manual, disarankan otomatis dari nama) --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}">
                                            <label for="slug" class="lh-1 text-16 text-light-1">Slug (URL Friendly Name)</label>
                                        </div>
                                        <div class="text-13 text-light-1 mt-5">Kosongkan jika ingin dibuat otomatis dari Nama Kategori.</div>
                                        @error('slug')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-30">
                                    <div class="fw-500">Thumbnail Kategori</div>
                                    <div class="row x-gap-20 y-gap-20 pt-15">
                                        {{-- Input File Thumbnail --}}
                                        <div class="col-auto">
                                            <div class="w-200">
                                                <div class="d-flex ratio ratio-1:1">
                                                    <label for="thumbnail" class="flex-center flex-column text-center bg-blue-2 h-full w-1/1 absolute rounded-4 border-type-1" style="cursor: pointer;">
                                                        <div class="icon-upload-file text-40 text-blue-1 mb-10"></div>
                                                        <div class="text-blue-1 fw-500">Masukkan Gambar</div>
                                                    </label>
                                                    <input type="file" name="thumbnail" id="thumbnail" accept="image/png, image/jpeg" style="display: none;">
                                                    {{-- Preview Thumbnail --}}
                                                    <img id="thumbnail-preview" src="#" alt="Thumbnail Preview" class="img-ratio rounded-4" style="display: none;">
                                                </div>
                                                <div class="text-center mt-10 text-14 text-light-1">Masukkan Gambar dengan Ekstensi PNG dan JPG lebar dan tinggi tidak lebih dari 800px</div>
                                            </div>
                                            @error('thumbnail')
                                                <div class="text-red-1 mt-5">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="border-top-light mt-30 mb-30"></div>

                                <div class="text-18 fw-500 mb-10">Meta Data (Untuk Keperluan SEO dan Social Media Share)</div>
                                <div class="row x-gap-20 y-gap-20">
                                    {{-- Meta Description --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <textarea name="meta_description" id="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                                            <label for="meta_description" class="lh-1 text-16 text-light-1">Meta Description (Untuk SEO)</label>
                                        </div>
                                        @error('meta_description')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Meta Keywords --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}">
                                            <label for="meta_keywords" class="lh-1 text-16 text-light-1">Meta Keywords (Pisahkan dengan koma)</label>
                                        </div>
                                        @error('meta_keywords')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Meta Open Graph Title --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="meta_og_title" id="meta_og_title" value="{{ old('meta_og_title') }}">
                                            <label for="meta_og_title" class="lh-1 text-16 text-light-1">Open Graph Title (Untuk Sosial Media)</label>
                                        </div>
                                        @error('meta_og_title')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Meta Open Graph Description --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <textarea name="meta_og_description" id="meta_og_description" rows="3">{{ old('meta_og_description') }}</textarea>
                                            <label for="meta_og_description" class="lh-1 text-16 text-light-1">Open Graph Description (Untuk Sosial Media)</label>
                                        </div>
                                        @error('meta_og_description')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Meta Open Graph Type --}}
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="meta_og_type" id="meta_og_type" value="{{ old('meta_og_type', 'website') }}"> {{-- Default value bisa diatur --}}
                                            <label for="meta_og_type" class="lh-1 text-16 text-light-1">Open Graph Type (e.g., website, product.category)</label>
                                        </div>
                                        @error('meta_og_type')
                                            <div class="text-red-1 mt-5">{{ $message }}</div>
                                        @enderror
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
                {{-- Form berakhir di sini --}}
            </div>

            <footer class="footer -dashboard mt-60">
                <div class="footer__row row y-gap-10 items-center justify-between">
                    <div class="col-auto">
                        <div class="row y-gap-20 items-center">
                            <div class="col-auto">
                                <div class="text-14 lh-14 mr-30">© {{ date('Y') }} Blessing89 All rights reserved.</div>
                            </div>
                            <div class="col-auto">
                                <div class="row x-gap-20 y-gap-10 items-center text-14">
                                    <div class="col-auto">
                                        <a href="#" class="text-13 lh-1">Privacy</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-13 lh-1">Terms</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="text-13 lh-1">Site Map</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="d-flex x-gap-5 y-gap-5 items-center">
                            <button class="text-14 fw-500 underline">English (US)</button>
                            <button class="text-14 fw-500 underline">IDR</button> {{-- Mengganti USD ke IDR --}}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- Script untuk Preview Gambar Thumbnail --}}
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

        // Script untuk Slug Otomatis (Opsional, tapi sangat direkomendasikan)
        document.getElementById('name').addEventListener('keyup', function() {
            const nameInput = this.value;
            const slugInput = document.getElementById('slug');
            // Hanya isi slug jika belum diisi manual oleh user
            if (slugInput.value === '' || slugInput.dataset.manual === 'false') {
                slugInput.value = nameInput.toLowerCase()
                                    .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter non-alphanumeric kecuali spasi dan strip
                                    .replace(/\s+/g, '-')       // Ganti spasi dengan strip
                                    .replace(/-+/g, '-');        // Ganti banyak strip dengan satu strip
            }
        });

        // Tandai slug jika diubah manual
        document.getElementById('slug').addEventListener('input', function() {
            this.dataset.manual = 'true';
        });
    </script>
    <script>
  document.querySelectorAll('.select__options__button').forEach(btn => {
    btn.addEventListener('click', function () {
      const selectedValue = this.getAttribute('data-value').trim();
      document.getElementById('label').value = selectedValue;
    });
  });
</script>

    @endpush
@endsection