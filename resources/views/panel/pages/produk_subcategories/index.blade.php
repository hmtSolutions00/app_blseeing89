@extends('panel.layout.admin')

@section('content')
<div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
                <div class="col-auto">
                    <h1 class="text-30 lh-14 fw-600">Subkategori Produk</h1>
                    <div class="text-15 text-light-1">Kelola Subkategori dari Jasa dan Layanan</div>
                </div>

                <div class="col-auto">
                    <form method="GET" action="{{ route('admin-panel.sub_categories.index') }}">
                        <div class="row x-gap-20 y-gap-20 items-center">
                            <div class="col-auto">
                                <select name="category_id" onchange="this.form.submit()" class="form-select bg-white text-dark-1 h-50 px-20 rounded-4 w-230">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="col-auto">
                                <a href="{{ route('admin-panel.sub_categories.create') }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white d-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 icon-add-button mr-10" width="20px" height="20px">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Tambah Subkategori
                                </a>
                            </div>
                        </div>
                    </form>
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
                @if (session('error'))
                    <div class="py-15 px-20 rounded-4" style="background-color: #ec413b;">
                        <div class="d-flex justify-between items-center">
                            <div class="d-flex items-center">
                                <i class="icon-check-circle text-20 text-blue-1 mr-10"></i>
                                <span class="fw-500 text-blue-1">{{ session('error') }}</span>
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
                                            <th>Nama Subkategori</th>
                                            <th>Kategori Induk</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subcategories as $index => $subcategory)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-blue-1 fw-500">{{ $subcategory->name }}</td>
                                                <td>{{ $subcategory->category->name ?? '-' }}</td>
                                                <td>{{ Str::limit(strip_tags($subcategory->description), 100) }}</td>
                                                <td>
                                                    <div class="row x-gap-10 y-gap-10 items-center">
                                                        <div class="col-auto">
                                                            <a href="{{ route('admin-panel.sub_categories.show', $subcategory->id) }}?{{ http_build_query(request()->query()) }}" class="flex-center bg-light-2 rounded-4 size-35" title="Detail">
                                                                <i class="icon-eye text-16 text-light-1"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="{{ route('admin-panel.sub_categories.edit', $subcategory->id) }}?{{ http_build_query(request()->query()) }}" class="flex-center bg-light-2 rounded-4 size-35" title="Edit">
                                                                <i class="icon-edit text-16 text-light-1"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="{{ route('admin-panel.sub_categories.destroy', $subcategory->id) }}" method="POST" onsubmit="return confirm('Hapus subkategori ini?')">
                                                                @csrf
                                                                @method('DELETE')
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
                                                <td colspan="5" class="text-center text-danger">Belum ada data subkategori.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-30">{{ $subcategories->appends(request()->query())->links() }}</div>
            </div>

            @include('panel.component.footer')
        </div>
    </div>
</div>
@endsection
