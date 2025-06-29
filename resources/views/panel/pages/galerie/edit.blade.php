@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Edit Galeri</h1>
                <div class="text-15 text-light-1">Perbarui informasi galeri di bawah ini</div>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            @if ($errors->any())
                <div class="py-15 px-20 rounded-4 bg-red-1 text-white mb-20">
                    <strong class="fw-500">Terjadi kesalahan:</strong>
                    <ul class="mt-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin-panel.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="form-input">
                    <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required>
                    <label class="lh-1 text-16 text-light-1">Judul Galeri</label>
                </div>

                {{-- Deskripsi --}}
                <div class="form-input mt-20">
                    <textarea name="description" id="description" rows="5" required>{!! old('description', $galeri->description) !!}</textarea>
                    <label class="lh-1 text-16 text-light-1">Deskripsi Galeri</label>
                </div>

                {{-- Thumbnail --}}
                <div class="mt-30">
                    <label class="fw-500">Thumbnail Galeri</label>
                    <input type="file" name="thumbnail" class="form-control mt-10" accept="image/*">
                    @if($galeri->thumbnail)
                        <div class="mt-10">
                            <img src="{{ asset($galeri->thumbnail) }}" alt="Thumbnail" style="max-height: 200px;" class="rounded-4">
                        </div>
                    @endif
                </div>

                {{-- Galeri Gambar --}}
                <div class="mt-30">
                    <label class="fw-500">Galeri Gambar (Maks. 20 gambar)</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="form-control mt-10">
                    <div class="row x-gap-10 y-gap-10 mt-10">
                        @foreach($galeri->imageGaleri as $image)
                            <div class="col-auto position-relative" style="width: 120px;">
                                <img src="{{ asset($image->image_url) }}" alt="Image" class="rounded-4" style="width: 100%; height: auto;">
                                <a href="{{ route('admin-panel.galeri.image.delete', $image->id) }}"
                                   onclick="return confirm('Hapus gambar ini?')"
                                   class="position-absolute top-0 end-0 bg-red-1 text-white rounded-circle p-1"
                                   style="z-index: 10; transform: translate(50%, -50%); font-size: 12px;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Meta SEO --}}
                <div class="border-top-light mt-30 mb-30"></div>
                <div class="text-18 fw-500 mb-10">Meta SEO</div>

                {{-- Slug disembunyikan --}}
                {{-- <input type="hidden" name="slug" value="{{ $galeri->slug }}"> --}}

                <div class="form-input mt-20">
                    <textarea name="meta_description" rows="2">{{ old('meta_description', $galeri->meta_description) }}</textarea>
                    <label>Meta Description</label>
                </div>

                <div class="form-input mt-20">
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $galeri->meta_keywords) }}">
                    <label>Meta Keywords</label>
                </div>

                <div class="form-input mt-20">
                    <input type="text" name="meta_og_title" value="{{ old('meta_og_title', $galeri->meta_og_title) }}">
                    <label>OG Title</label>
                </div>

                <div class="form-input mt-20">
                    <textarea name="meta_og_description" rows="2">{{ old('meta_og_description', $galeri->meta_og_description) }}</textarea>
                    <label>OG Description</label>
                </div>

                <div class="form-input mt-20">
                    <input type="text" name="meta_og_type" value="{{ old('meta_og_type', $galeri->meta_og_type ?? 'website') }}">
                    <label>OG Type</label>
                </div>

                <div class="pt-30">
                    <button class="button h-50 px-24 -dark-1 bg-blue-1 text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endpush
