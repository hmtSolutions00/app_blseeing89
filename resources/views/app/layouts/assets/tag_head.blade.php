@php
        $routeName = Route::currentRouteName();
        $currentUrl = url()->current();
        $homeRouteNames = ['index', 'frontend.products.layanan', 'aboutus.index','galeri.list']; // Sesuaikan

        $isHomePage = in_array($routeName, $homeRouteNames);
    @endphp

    @if($isHomePage)
        <title>Blessing89 Tour Travel | Solusi Terbaik Teman Perjalanan Anda</title>
        <meta name="description" content="Blessing89 Tour Travel - Temukan paket wisata terbaik, tour domestik & internasional yang tak terlupakan. Liburan impian Anda dimulai di sini!">
        <meta name="keywords" content="travel, tour, blessing89, paket wisata, liburan, destinasi, domestik, internasional, tour travel murah, agen perjalanan">
        <link rel="canonical" href="{{ $currentUrl }}">
        <meta property="og:title" content="Blessing89 Tour Travel | Solusi Terbaik Teman Perjalanan Anda">
        <meta property="og:description" content="Temukan paket wisata terbaik, tour domestik & internasional yang tak terlupakan. Liburan impian Anda dimulai di sini bersama Blessing89 Tour Travel.">
        <meta property="og:image" content="{{ url('assets/images/logo_kelae.png') }}">
        <meta property="og:url" content="{{ $currentUrl }}">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Blessing89 Tour Travel">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@Blessing89Travel">
        <meta name="twitter:title" content="Blessing89 Tour Travel | Liburan Impian Anda Dimulai Di Sini">
        <meta name="twitter:description" content="Temukan paket wisata terbaik, tour domestik & internasional yang tak terlupakan bersama Blessing89 Tour Travel.">
        <meta name="twitter:image" content="{{ url('assets/images/logo_kelae.png') }}">
    @else
        @stack('dynamic_tag')
    @endif
























