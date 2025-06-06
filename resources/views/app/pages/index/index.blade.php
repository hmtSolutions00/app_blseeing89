@extends('app.layouts.index')
@section('custom_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection
@section('content')
      {{--Kategori Produk dan layanan kami --}}
      @include('app.pages.index.categories')
      {{-- End Kategori Produk dan kayanan kami --}}
      @include('app.pages.index.products')

@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  const mastheadImageCarousel = new Swiper('#mastheadImageCarouselOnly', {
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    speed: 600,
    slidesPerView: 1,
    effect: 'slide', // efek geser ke samping
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
</script>



@endsection