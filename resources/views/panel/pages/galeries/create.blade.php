@extends('panel.layout.admin')

@section('content')
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Tambah Galeri Baru</h1>
                    <div class="text-15 text-light-1">Gunakan halaman ini untuk menambahkan galeri dan gambar-gambarnya.
                    </div>
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
                    <div class="border-top-light mt-30 mb-30"></div>
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fw-500">Gambar/Video Galeri</div>
                                <div class="mt-15">
                                    <input type="file" name="path_items" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fw-500">Jenis Item yang Diupload</div>
                                <div class="mt-15">
                                   <select name="jenis_items" id="jenis_items" class="form-control">
                                        <option value="" selected disabled>-- PIlih Jenis Item yang Diupload --</option>
                                        <option value="Gambar">Gambar</option>
                                        <option value="Video">Video</option>
                                   </select>
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
