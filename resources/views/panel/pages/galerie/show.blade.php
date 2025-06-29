@extends('panel.layout.admin')

@section('content')
<div class="dashboard__main">
    <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
            <div class="col-auto">
                <h1 class="text-30 lh-14 fw-600">Detail Galeri</h1>
                <div class="text-15 text-light-1">Lihat informasi galeri secara lengkap</div>
            </div>
        </div>

        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            {{-- Judul --}}
            <div class="mb-20">
                <div class="text-16 text-light-1">Judul Galeri</div>
                <div class="fw-500 mt-5">{{ $galeri->judul }}</div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-30">
                <div class="text-16 text-light-1 mb-5">Deskripsi Galeri</div>
                <div class="border rounded-4 p-20 bg-light-3">
                    {!! $galeri->description !!}
                </div>
            </div>

            {{-- Thumbnail --}}
            <div class="mb-30">
                <div class="text-16 text-light-1 mb-10">Thumbnail Galeri</div>
                @if($galeri->thumbnail)
                    <img src="{{ asset($galeri->thumbnail) }}" alt="Thumbnail" class="rounded-4" style="max-height: 200px;">
                @else
                    <div class="text-light-1">Tidak ada thumbnail</div>
                @endif
            </div>

            {{-- Galeri Gambar --}}
            <div class="mb-30">
                <div class="text-16 text-light-1 mb-10">Galeri Gambar</div>
                <div class="row x-gap-10 y-gap-10">
                    @forelse($galeri->imageGaleri as $image)
                        <div class="col-auto">
                            <img src="{{ asset($image->image_url) }}" alt="Image" class="rounded-4" style="width: 120px; height: auto;">
                        </div>
                    @empty
                        <div class="text-light-1">Belum ada gambar tambahan.</div>
                    @endforelse
                </div>
            </div>

            {{-- Meta SEO --}}
            <div class="border-top-light pt-30 mt-30 mb-30"></div>
            <div class="text-18 fw-500 mb-20">Meta SEO</div>

            <div class="mb-10">
                <div class="text-16 text-light-1">Meta Description</div>
                <div class="fw-500 mt-5">{{ $galeri->meta_description ?? '-' }}</div>
            </div>

            <div class="mb-10">
                <div class="text-16 text-light-1">Meta Keywords</div>
                <div class="fw-500 mt-5">{{ $galeri->meta_keywords ?? '-' }}</div>
            </div>

            <div class="mb-10">
                <div class="text-16 text-light-1">OG Title</div>
                <div class="fw-500 mt-5">{{ $galeri->meta_og_title ?? '-' }}</div>
            </div>

            <div class="mb-10">
                <div class="text-16 text-light-1">OG Description</div>
                <div class="fw-500 mt-5">{{ $galeri->meta_og_description ?? '-' }}</div>
            </div>

            <div class="mb-10">
                <div class="text-16 text-light-1">OG Type</div>
                <div class="fw-500 mt-5">{{ $galeri->meta_og_type ?? 'website' }}</div>
            </div>

            {{-- Tombol Ubah --}}
            <div class="pt-30">
                <a href="{{ route('admin-panel.galeri.edit', $galeri->id) }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
                    Ubah Galeri
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
