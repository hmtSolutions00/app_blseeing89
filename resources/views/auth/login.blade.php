@extends('layouts.app')

@section('content')
    <section class="layout-pt-lg layout-pb-lg bg-dark-3">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                            <div class="row y-gap-20">
                                <div class="col-12 text-center">
                                    <img src="{{ url('assets/images/logo_kelae.png')}}" alt="logo icon" class="w-25">
                                    <h1 class="text-22 fw-500">Selamat Datang!</h1>
                                    <h5>Silahkan masukkan email dan password untuk mengakses halaman Admin!</h5>
                                </div>

                                <div class="col-12">

                                    <div class="form-input ">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <label class="lh-1 text-14 text-light-1">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="form-input ">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        <label class="lh-1 text-14 text-light-1">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                {{-- <div class="col-12">
                                    <a href="#" class="text-14 fw-500 text-blue-1 underline">Forgot your password?</a>
                                </div> --}}

                                <div class="col-12">
                                    <button type="submit" class=" col-12 button py-20 -dark-1 bg-dark-3 text-white">
                                        Masuk <div class="icon-arrow-top-right ml-15"></div>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
