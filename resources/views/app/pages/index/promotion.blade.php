<section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">
        <div class="tabs -pills-2 js-tabs">
            <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
                <div class="col-12">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title">Video Promosi Produk</h2>
                        <p class="sectionTitle__text mt-5 sm:mt-0">
                            Saksikan video promosi eksklusif dari produk unggulan kami.
                            Temukan fitur dan keunggulan menarik yang kami tawarkan.
                        </p>
                    </div>
                </div>

                {{-- ✅ Video Produk --}}
                <div class="col-12 col-lg-6">
                    <video controls style="max-height: 500px; min-height: 500px; width: 100%;">
                        <source src="{{ asset('/uploads/video/promo_tour_blessing89tourtravel.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>

                <div class="col-12 col-lg-6">
                    <video controls style="max-height: 500px; min-height: 500px; width: 100%;">
                        <source src="{{ asset('/uploads/video/promo_rental_mobil_hiace_blessing89tourtravel.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
