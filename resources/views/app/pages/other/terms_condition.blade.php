@extends('app.layouts.index')

@section('content')
<section class="py-10 d-flex items-center bg-light-2">
    <div class="container">
        <div class="row y-gap-10 items-center justify-between">
            <div class="col-auto">
                <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                    <div class="col-auto">
                        <div class="">Beranda</div>
                    </div>
                    <div class="col-auto">
                        <div class="">></div>
                    </div>
                    <div class="col-auto">
                        <div class="">Syarat dan Ketentuan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="layout-pt-md">
  <div class="container">
    <div class="row justify-center text-center">
      <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="sectionTitle -md">
          <h2 class="sectionTitle__title">Syarat dan Ketentuan</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Ketentuan berikut mengatur penggunaan situs web ini oleh pengunjung.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="layout-pt-md layout-pb-md">
  <div class="container">
    <div class="row y-gap-30">
      <div class="col-lg-12">
        <div class="text-22 fw-500">Informasi Penting</div>

        <div class="accordion -simple row y-gap-20 pt-30 js-accordion">

          {{-- 1. Penggunaan Situs --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Penggunaan Situs</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Website ini disediakan sebagai media informasi dan promosi produk/jasa. Dengan mengakses situs ini, Anda setuju untuk menggunakan informasi yang tersedia hanya untuk tujuan yang sah dan sesuai hukum.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 2. Tanggung Jawab Pengguna --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Tanggung Jawab Pengguna</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Pengunjung bertanggung jawab atas setiap keputusan atau tindakan yang diambil berdasarkan informasi di website ini. Kami tidak menjamin keakuratan atau kelengkapan informasi yang tersedia.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 3. Hak Kekayaan Intelektual --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Hak Kekayaan Intelektual</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Seluruh konten di situs ini, termasuk namun tidak terbatas pada teks, gambar, logo, dan desain, adalah milik kami dan dilindungi oleh undang-undang hak cipta. Dilarang menggunakan atau mendistribusikan ulang tanpa izin tertulis.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 4. Tautan ke WhatsApp --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Tautan ke WhatsApp</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Situs ini menyediakan tautan langsung ke WhatsApp untuk komunikasi lebih lanjut. Kami tidak memiliki kontrol atas isi atau kebijakan privasi dari platform pihak ketiga tersebut.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 5. Perubahan Ketentuan --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Perubahan Syarat dan Ketentuan</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Kami berhak untuk mengubah isi dari syarat dan ketentuan ini sewaktu-waktu. Perubahan akan segera berlaku setelah dipublikasikan di halaman ini.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 6. Kontak --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Hubungi Kami</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Jika Anda memiliki pertanyaan mengenai syarat dan ketentuan ini, silakan hubungi kami melalui WhatsApp yang tersedia pada halaman utama.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- End Accordion -->
      </div>
    </div>
  </div>
</section>
@endsection
