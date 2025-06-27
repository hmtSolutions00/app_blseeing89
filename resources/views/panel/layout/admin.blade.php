<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <!-- Google fonts -->
    <link rel="preconnect" href="{{ url('assets/fonts.googleapis.com/index.html') }}">
    <link rel="preconnect" href="{{ url('assets/fonts.gstatic.com/index.html') }}" crossorigin>
    <link
        href="{{ url('assets/fonts.googleapis.com/css272a9.css?family=Jost:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap') }}"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css') }}"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @stack('custom_css')
    <link href="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ url('https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css') }}"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Admin Blessing89</title>
</head>

<body data-barba="wrapper">
    <div class="header-margin"></div>

    @include('panel.component.header')
    <div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
        @include('panel.component.sidebar')

        @yield('content')
    </div>
    <!-- JavaScript -->
    <script src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM') }}"></script>
    <script src="{{ url('assets/unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js') }}"></script>

    <script src="{{ url('assets/js/vendors.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    @stack('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js') }}"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</body>

</html>
