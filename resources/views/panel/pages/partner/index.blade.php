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
                    <h1 class="text-30 lh-14 fw-600">Kelola Partner</h1>
                    <div class="text-15 text-light-1">Kelola Partner Blessing89 Tour & travel</div>
                </div>
                <div class="col-md-12">
                    <a href="/admin-panel/partner/create" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-plus"></i> Tambah Partner
                    </a>
                </div>
            </div>

            <div class="py-30 px-30 rounded-4 bg-white shadow-3 col-9" style="place-self: anchor-center;">
                <div class="tabs -underline-2 js-tabs">
                    <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls" style="min-height:300px">
                        <table class="table table-3-border-bottom col-12" id="table-partner">
                            <thead class="bg-light-2">
                                <tr>
                                    <th class="text-center" style="font-weight: bold">Nama Partner</th>
                                    <th class="text-center" style="font-weight: bold">Logo Partner</th>
                                    <th class="text-center" style="font-weight: bold">Website Partner</th>
                                    <th class="text-center" style="font-weight: bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->name }}</td>
                                        <td><a href="/uploads/partner/{{ $partner->logo_path }}"> Lihat Logo Partner</a></td>
                                        <td><a href="{{ $partner->website_url }}">{{ $partner->website_url }}</a></td>
                                        <td class="action">
                                            <div class="row x-gap-10 y-gap-10 items-center">
                                                {{-- Tombol Detail --}}
                                                <div class="col-auto">
                                                    <a href="{{ route('admin-panel.partner.show', $partner->id) }}"
                                                        class="flex-center bg-light-2 rounded-4 size-35" title="Detail">
                                                        <i class="icon-eye text-16 text-light-1"></i>
                                                    </a>
                                                </div>

                                                {{-- Tombol Edit --}}
                                                <div class="col-auto">
                                                    <a href="{{ route('admin-panel.partner.edit', $partner->id) }}"
                                                        class="flex-center bg-light-2 rounded-4 size-35" title="Edit">
                                                        <i class="icon-edit text-16 text-light-1"></i>
                                                    </a>
                                                </div>

                                                {{-- Tombol Delete --}}
                                                <div class="col-auto">
                                                    <button class="flex-center bg-light-2 rounded-4 size-35" title="Hapus"
                                                        onclick="deleteConfirmation(this)">
                                                        <i class="icon-trash-2 text-16 text-light-1"></i>
                                                        <input type="hidden" class="id_car" name="id_car" id="id_car"
                                                            value="{{ $partner->id }}">
                                                    </button>
                                                    </form>
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
                    window.location.href = '/admin-panel/partner/delete/' + kode;
                }
            });
        }
        var table = $('#table-partner').DataTable({
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
