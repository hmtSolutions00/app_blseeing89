<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- meta tags default for all-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Dinamis Meta tags --}}
    @include('app.layouts.assets.tag_head')
    {{-- end dinamis meta tags --}}
    <!-- Google fonts -->
    <link rel="preconnect" href="{{ url('assets//fonts.googleapis.com/index.html') }}">
    <link rel="preconnect" href=".{{ url('assets//fonts.gstatic.com/index.html') }}" crossorigin>
    <link href="{{ url('assets/fonts.googleapis.com/css29b3e.css?family=Jost:wght@400;500;600&amp;display=swap') }}"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- End meta tags default for all --}}
    @include('app.layouts.assets.css')
    <link rel="stylesheet" href="{{ url('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">

</head>

<body>
    {{-- preloader --}}
    @if (Route::currentRouteName() === 'index')
        @include('app.layouts.assets.preloader')
    @endif
    {{-- preloader --}}
    <main style="font-family: var(--font-primary);">

      {{-- Start Menu & carousel condition --}}
      @include('app.layouts.assets.header')
 
    <section data-anim-wrap class="masthead -type-2 js-mouse-move-container bg-dark-3">
      <div class="masthead__bg ">
        <img src="{{url('assets/img/masthead/2/bg.png')}}" alt="image">
      </div>
        {{-- Start Menu & carousel condition --}}
            <div class="container">
                <!-- menu -->
                @include('app.layouts.assets.header')
                <!-- menu -->
                @include('app.layouts.assets.menu')
                <!-- Carousel -->
                @if (Route::currentRouteName() === 'index')
                    @include('app.pages.index.carousel')
                @endif

            </div>
        </section>

        {{-- END Start Menu & carousel condition --}}
        @yield('content')



        @include('app.layouts.assets.footer')

    </main>


    {{-- Start Java Script --}}
    @include('app.layouts.assets.js')
    {{-- End Java Script --}}

</body>

</html>
