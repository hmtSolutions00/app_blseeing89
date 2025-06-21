@extends('panel.layout.admin')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />


    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Tidak Berhasil',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        </script>
    @endif


    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2" style="font-family: var(--font-primary);">
            <div class="row y-gap-20 justify-between items-end pb-30 lg:pb-40 md:pb-32">
                <div class="col-12">
                    <h1 class="text-30 lh-14 fw-600">Kelola Carousel</h1>
                    <div class="text-15 text-light-1">Kelola Carousel Blessing89 Tour & travel</div>
                </div>
                <div class="col-md-12">
                    <a href="/admin-panel/carousel/create" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-plus"></i> Tambah Carousel
                    </a>
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3 col-9" style="place-self: anchor-center;">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <table class="table table-3-border-bottom col-12" id="table-carousel">
                            <thead class="bg-light-2">
                                <tr>
                                    <th class="text-center" style="font-weight: bold">Judul</th>
                                    <th class="text-center" style="font-weight: bold">URL Gambar</th>
                                    <th class="text-center" style="font-weight: bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousels as $carousel)
                                    <tr>
                                        <td>{{ $carousel->judul }}</td>
                                        <td class="text-center"><a href="/carousel-images/{{ $carousel->url_images }}"
                                                style="color: cornflowerblue">Link URL
                                                Gambar</a></td>
                                        <td class="action" style="place-items: center">
                                            <div class="dropdown">
                                                <button
                                                    class="dropdown__button d-flex items-center rounded-4 text-blue-1 bg-blue-1-05 text-14 px-15 py-5 dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <div class="js-dropdown-title">Aksi</div>
                                                </button>
                                                <div class="dropdown-style dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <div class="text-16 fw-500 js-dropdown-list">
                                                        <div class="mb-2">
                                                            <a class="dropdown-item d-block js-dropdown-link"
                                                                href="{{ route('admin-panel.carousel.show', $carousel->id) }}">
                                                                Detail</a>
                                                        </div>
                                                        <div class="mb-2">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin-panel.carousel.edit', $carousel->id) }}">Ubah</a>
                                                        </div>
                                                        <div>
                                                            <button class="dropdown-item"
                                                                onclick="deleteConfirmation(this)">Hapus</button>
                                                            <input type="hidden" class="id_car" name="id_car"
                                                                id="id_car" value="{{ $carousel->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @include('panel.component.footer')
        </div>
    </div>


    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
    </script>
    <script>
        function deleteConfirmation(button) {
            var kode = $(button).closest('.action').find('#id_car').val();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin-panel/carousel/delete/' + kode;
                }
            });
        }
        var table = $('#table-carousel').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100],
            "order": [
                [1, "desc"]
            ],
            "language": {
                "lengthMenu": "Menampilkan _MENU_ Data per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada data yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total data)",
                "search": "Cari :",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "",
                    "previous": ""
                },
                "dom": 'lrtip',
                "columnDefs": [{
                        type: 'date',
                        targets: 5
                    } // Sesuaikan dengan indeks kolom tanggal Anda
                ]
            },

        });
    </script>
@endsection
