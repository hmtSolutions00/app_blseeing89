@extends('panel.layout.admin')

@section('content')
<div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Galeri</h1>
                    <div class="text-15 text-light-1">Kelola Data Galeri</div>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin-panel.galeri.create') }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white d-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 icon-add-button mr-10" width="20px" height="20px">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Galeri
                    </a>
                </div>
                @if (session('success'))
                    <div class="py-15 px-20 rounded-4" style="background-color: #d4edda;">
                        <div class="d-flex justify-between items-center">
                            <div class="d-flex items-center">
                                <i class="icon-check-circle text-20 text-blue-1 mr-10"></i>
                                <span class="fw-500 text-blue-1">{{ session('success') }}</span>
                            </div>
                            <button onclick="this.parentElement.parentElement.remove()" class="text-blue-1 text-20">
                                <i class="icon-close"></i>
                            </button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__content pt-30 js-tabs-content">
                        <div class="tabs__pane -tab-item-1 is-tab-el-active">
                            <div class="overflow-scroll scroll-bar-1">
                                <table class="table-4 -border-bottom col-12">
                                    <thead class="bg-light-2">
                                        <tr>
                                            <th>No</th>
                                            <th>Thumbnail</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($galeris as $index => $galeri)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if ($galeri->thumbnail)
                                                        <img src="{{ asset($galeri->thumbnail) }}" alt="{{ $galeri->judul }}" style="width: 60px; height: auto; border-radius: 8px;">
                                                    @else
                                                        <span class="text-light-1">-</span>
                                                    @endif
                                                </td>
                                                <td class="text-blue-1 fw-500">{{ $galeri->judul }}</td>
                                                <td>{{ Str::limit(strip_tags($galeri->description), 100) }}</td>
                                                <td>
                                                    <div class="row x-gap-10 y-gap-10 items-center">
                                                        <div class="col-auto">
                                                            <a href="{{ route('admin-panel.galeri.show', $galeri->id) }}" class="flex-center bg-light-2 rounded-4 size-35" title="Detail">
                                                                <i class="icon-eye text-16 text-light-1"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="{{ route('admin-panel.galeri.edit', $galeri->id) }}" class="flex-center bg-light-2 rounded-4 size-35" title="Edit">
                                                                <i class="icon-edit text-16 text-light-1"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="{{ route('admin-panel.galeri.destroy', $galeri->id) }}" method="GET" onsubmit="return confirm('Hapus galeri ini?')">
                                                                @csrf
                                                                <button class="flex-center bg-light-2 rounded-4 size-35" title="Hapus">
                                                                    <i class="icon-trash-2 text-16 text-light-1"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-danger">Belum ada data galeri.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-30">{{ $galeris->links() }}</div>
            </div>

            @include('panel.component.footer')
        </div>
    </div>
</div>
@endsection
