<!-- css -->


  <link rel="stylesheet" href="{{url('assets/css/vendors.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/main.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/lang.css')}}">
  <style>
    /* 1. Sembunyikan banner Google Translate di bagian atas */
.goog-te-banner-frame.skiptranslate {
    display: none !important;
}
html[lang="en"] .skiptranslate {
    display: none !important;
}

/* 2. Hapus spasi kosong yang ditinggalkan banner di atas body */
body {
    top:0px !important;
}
   /* Styling yang sudah ada */
.lang-selector button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    opacity: 0.6; /* Default opacity */
    transition: opacity 0.2s ease-in-out;
}

.lang-selector button:hover {
    opacity: 0.9; /* Hover effect */
}

.lang-selector button.active {
    opacity: 1; /* Active state */
}

.lang-selector img {
   
    border-radius: 2px; /* Sedikit rounded corner */
    box-shadow: 0 0 3px rgba(0,0,0,0.2);
}

.header-logo img {
    max-width: 100%;
    height: auto;
    display: block;
}

/* --- Penyesuaian Khusus Mobile (di bawah ini) --- */

@media screen and (max-width: 768px) { /* Breakpoint 768px adalah umum untuk tablet/mobile */
    /* Adjustments for the main header row to be flexible */
    .header__container .row > .row.col-lg-12 {
        display: flex; /* Ensure flexbox behavior */
        flex-wrap: nowrap; /* Prevent items from wrapping to the next line */
        align-items: center; /* Vertically align items */
        padding-left: 15px; /* Tambahkan padding agar tidak terlalu mepet ke kiri */
        padding-right: 15px; /* Tambahkan padding agar tidak terlalu mepet ke kanan */
    }

    /* Logo Column (col-3) */
    .header__container .row > .row.col-lg-12 .col-3 {
        flex: 0 0 auto; /* Keep its size fixed */
        width: 70px; /* Lebarkan sedikit logo jika perlu */
        max-width: 70px; /* Batasi lebar maksimal agar tidak terlalu besar */
        margin-right: 10px; /* Kurangi margin jika perlu, agar ada ruang untuk teks */
    }

    .header-logo img {
        width: 60px; /* Sesuaikan ukuran logo di mobile agar tidak terlalu besar */
        height: auto;
    }

    /* Title Column (col-6) */
    .header__container .row > .row.col-lg-12 .col-6 {
        flex: 1; /* Allow this column to take up remaining space */
        min-width: 0; /* Crucial for overflow: hidden to work correctly */
        padding-right: 5px; /* Tambah sedikit padding untuk teks */
    }

    .col-6 h2 {
        font-size: 0.9rem; /* Lebih dikecilkan lagi agar teks muat */
        line-height: 1.2; /* Atur line height untuk keterbacaan */
        white-space: nowrap; /* Prevent text from wrapping */
        overflow: hidden; /* Hide overflow content */
        text-overflow: ellipsis; /* Add ellipsis for hidden text */
        margin: 0; /* Hapus margin default h2 yang mungkin menyebabkan masalah */
        padding: 0; /* Hapus padding default h2 */
    }

    /* Language Button Column (col-1) */
    .header__container .row > .row.col-lg-12 .col-1 {
        flex: 0 0 auto; /* Keep its size fixed */
        width: auto; /* Let it shrink to content size */
        padding-left: 5px; /* Sesuaikan padding */
        padding-right: 0; /* Sesuaikan padding */
    }

    /* Override any specific Bootstrap `mr-30` classes if they cause issues */
    .col-3.mr-30,
    .col-6.mr-30 {
        margin-right: 0 !important; /* Hapus margin yang berlebihan di mobile */
    }
}

/* Additional smaller breakpoint for very small phones if needed */
@media screen and (max-width: 480px) {
    .header__container .row > .row.col-lg-12 .col-3 {
        width: 50px;
        max-width: 50px;
    }
    .header-logo img {
        width: 50px;
    }
    .col-6 h2 {
        font-size: 0.8rem; /* Further reduce font size for very small screens */
    }
}
/* Atur gaya default untuk semua ukuran layar */
#lang-word {
  font-size: 14px; /* Ukuran font normal sesuai kelas .text-14 */
  vertical-align: middle; /* Membantu teks tetap sejajar dengan gambar */
}

/* Terapkan gaya ini hanya untuk layar dengan lebar MAKSIMAL 767px (mobile) */
@media (max-width: 767.98px) {
  #lang-word {
    font-size: 4px; /* 👈 Ubah ukuran font menjadi lebih kecil di mobile */
  }
}
</style>
  @stack('custom_css')
    {{-- End css --}}