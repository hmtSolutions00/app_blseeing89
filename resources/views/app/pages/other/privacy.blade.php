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
                        <div class="">Kebijakan Privasi</div>
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
          <h2 class="sectionTitle__title">Kebijakan Privasi</h2>
          <p class=" sectionTitle__text mt-5 sm:mt-0">Kebijakan ini menjelaskan bagaimana kami mengelola informasi pengguna pada situs ini.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-md">
  <div class="container">
    <div class="row y-gap-30">
      <div class="col-lg-12">
        <div class="text-22 fw-500">Informasi Kebijakan</div>

        <div class="accordion -simple row y-gap-20 pt-30 js-accordion">

          {{-- 1. Informasi yang Dikumpulkan --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Informasi yang Kami Kumpulkan</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Situs ini tidak mengumpulkan informasi pribadi apapun dari pengguna. Kami tidak memiliki formulir pendaftaran, login, atau pengumpulan data secara otomatis.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 2. Penggunaan Informasi --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Penggunaan Informasi</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Karena kami tidak mengumpulkan informasi apapun, tidak ada data yang digunakan untuk tujuan apapun. Seluruh interaksi dilakukan melalui WhatsApp.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 3. Cookie dan Pelacakan --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Penggunaan Cookie</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Kami tidak menggunakan cookie, pelacak, atau teknologi serupa untuk memantau aktivitas pengguna di situs ini.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 4. Tautan ke Pihak Ketiga --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Tautan ke Pihak Ketiga</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Website kami mengarahkan pengguna ke WhatsApp untuk komunikasi lebih lanjut. Kami tidak bertanggung jawab atas kebijakan privasi dan keamanan dari layanan pihak ketiga tersebut.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 5. Perubahan Kebijakan --}}
          <div class="col-12">
            <div class="accordion__item px-20 py-20 border-light rounded-4">
              <div class="accordion__button d-flex items-center">
                <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                  <i class="icon-plus"></i>
                  <i class="icon-minus"></i>
                </div>
                <div class="button text-dark-1">Perubahan Kebijakan Privasi</div>
              </div>
              <div class="accordion__content">
                <div class="pt-20 pl-60">
                  <p class="text-15">
                    Kami dapat memperbarui kebijakan ini dari waktu ke waktu. Perubahan akan diinformasikan melalui halaman ini dan berlaku sejak tanggal dipublikasikan.
                  </p>
                </div>
              </div>
            </div>
          </div>

          {{-- 6. Kontak Kami --}}
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
                    Jika Anda memiliki pertanyaan atau masukan terkait kebijakan privasi ini, silakan hubungi kami melalui WhatsApp di nomor yang tersedia di website.
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
