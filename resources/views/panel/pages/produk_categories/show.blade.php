@extends('panel.layout.admin')

@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Detail Kategori Produk (Jasa & Layanan)</h1>
                    <div class="text-15 text-light-1">Lihat detail kategori produk tanpa dapat mengedit langsung.</div>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin-panel.categories.edit', $category->id) }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white d-flex items-center">
                        <i class="icon-edit mr-10"></i>
                        Ubah Data
                    </a>
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs__content pt-30 js-tabs-content">
                    <div class="tabs__pane -tab-item-1 is-tab-el-active">
                        <div class="col-xl-10">
                            <div class="text-18 fw-500 mb-10">Data Kategori</div>
                            <div class="row x-gap-20 y-gap-20">
                                {{-- Nama --}}
                                <div class="col-12">
                                    <label class="lh-1 text-16 text-light-1">Nama Kategori</label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $category->name }}" disabled>
                                        
                                    </div>
                                </div>

                                {{-- Deskripsi --}}
                                <div class="col-12">
                                     <label class="lh-1 text-16 text-light-1">Keterangan</label>
                                    <div class="form-input">
                                        <textarea rows="5" disabled>{{ $category->description }}</textarea>
                                       
                                    </div>
                                </div>

                                {{-- Slug --}}
                                <div class="col-12">
                                     <label class="lh-1 text-16 text-light-1">Slug</label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $category->slug }}" disabled>
                                       
                                    </div>
                                </div>
                            </div>

                            {{-- Thumbnail --}}
                            <div class="mt-30">
                                <div class="fw-500">Thumbnail Kategori</div>
                                <div class="row x-gap-20 y-gap-20 pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex ratio ratio-1:1 w-200 cursor-pointer">
                                            <img src="{{ asset($category->thumbnail) }}" alt="Thumbnail" class="img-ratio rounded-4" id="thumbnailModalTrigger" style="cursor: pointer;">
                                        </div>
                                    </div>
                                    <div id="thumbnailModal" style="display: none; position: fixed; top: 0; left: 0; z-index: 9999; width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.8);" onclick="closeThumbnailModal()">
                                        <div style="position: relative; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                            <img src="{{ asset($category->thumbnail) }}" alt="Preview" style="max-width: 90vw; max-height: 90vh; border-radius: 10px;">
                                            <button type="button" onclick="closeThumbnailModal()" style="position: absolute; top: 20px; right: 20px; background-color: #f44336; color: white; border: none; padding: 10px 15px; border-radius: 4px; font-size: 18px; cursor: pointer;">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top-light mt-30 mb-30"></div>

                            {{-- Meta --}}
                            <div class="text-18 fw-500 mb-10">Meta Data</div>
                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-12">
                                    <label class="lh-1 text-16 text-light-1">Meta Description</label>
                                    <div class="form-input">
                                        <textarea rows="3" disabled>{{ $category->meta_description }}</textarea>
                                        
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="lh-1 text-16 text-light-1">Meta Keywords</label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $category->meta_keywords }}" disabled>
                                        
                                    </div>
                                </div>

                                <div class="col-12">
                                      <label class="lh-1 text-16 text-light-1">OG Title</label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $category->meta_og_title }}" disabled>
                                      
                                    </div>
                                </div>

                                <div class="col-12">
                                       <label class="lh-1 text-16 text-light-1">OG Description</label>
                                    <div class="form-input">
                                        <textarea rows="3" disabled>{{ $category->meta_og_description }}</textarea>
                                     
                                    </div>
                                </div>

                                <div class="col-12">
                                      <label class="lh-1 text-16 text-light-1">OG Type</label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $category->meta_og_type }}" disabled>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('panel.component.footer')
        </div>
    </div>

    @push('custom_js')
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
