<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/gotrip-html/db-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 May 2025 14:33:05 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="robots" content="noindex, nofollow">
    <!-- Google fonts -->
    <link rel="preconnect" href="../../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../../fonts.gstatic.com/index.html" crossorigin>
    <link
        href="../../../fonts.googleapis.com/css272a9.css?family=Jost:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
  
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{url('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/main.css')}}">

    <title>Admin Blessing89</title>
</head>

<body data-barba="wrapper">
    <div class="header-margin"></div>

    @include('panel.component.header')
    @include('panel.component.sidebar')

    @yield('content')
    <!-- JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    <script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>

    <script src="{{url('assets/js/vendors.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
</body>
</html>
