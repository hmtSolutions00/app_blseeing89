@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Tambah Galeri Baru</h1>
                <div class="text-15 text-light-1">Gunakan halaman ini untuk menambahkan galeri dan gambar-gambarnya.</div>
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

            <form action="{{ route('admin-panel.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Informasi Galeri</div>
                    <div class="row x-gap-20 y-gap-20">
                        {{-- Judul --}}
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="judul" required value="{{ old('judul') }}">
                                <label class="lh-1 text-16 text-light-1">Judul Galeri</label>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12">
                             <label class="lh-1 text-16 text-light-1">Deskripsi Galeri</label>
                            <div class="form-input">
                                <textarea name="description" id="editor" rows="6">{{ old('description') }}</textarea>
                               
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Upload Thumbnail & Gambar Galeri --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Gambar Galeri</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fw-500">Thumbnail Galeri</div>
                            <div class="mt-15">
                                <input type="file" name="thumbnail" accept="image/*" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fw-500">Upload Gambar Galeri (Maks. 20 gambar)</div>
                            <div class="mt-15">
                                <input type="file" name="images[]" accept="image/*" class="form-control" multiple>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Meta Data SEO --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="col-xl-10">
                    <div class="text-18 fw-500 mb-10">Meta Data (Untuk SEO)</div>
                    <div class="row x-gap-20 y-gap-20">
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="slug" value="{{ old('slug') }}">
                                <label class="lh-1 text-16 text-light-1">Slug</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                                <label class="lh-1 text-16 text-light-1">Meta Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}">
                                <label class="lh-1 text-16 text-light-1">Meta Keywords</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-input">
                                <input type="text" name="meta_og_title" value="{{ old('meta_og_title') }}">
                                <label class="lh-1 text-16 text-light-1">OG Title</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-input">
                                <textarea name="meta_og_description" rows="2">{{ old('meta_og_description') }}</textarea>
                                <label class="lh-1 text-16 text-light-1">OG Description</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input">
                                <input type="text" name="meta_og_type" value="{{ old('meta_og_type', 'website') }}">
                                <label class="lh-1 text-16 text-light-1">OG Type</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-inline-block pt-30">
                    <button type="submit" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                        Simpan Galeri <div class="icon-arrow-top-right ml-15"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor');

  document.getElementById('images').addEventListener('change', function(e) {
    if (this.files.length > 20) {
        alert('Maksimal 20 gambar!');
        this.value = "";
    }
  });
</script>
@endpush
