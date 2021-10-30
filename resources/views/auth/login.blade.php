@include('website.header')

@section('content')

    <div class="page-section">
        <h1 class="text-center wow fadeInUp">login User </h1>
        <div class="container">
            <div class="form-group row">

                <div class="col-md-8">


                </div>
            </div>

        </div>
        <div class="container">
            <div class="form-group row">

                <div class="col-md-8">


                </div>
            </div>

        </div>

        <div class="container">


            @include('partials._errors')


            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf


                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('password Address') }}</label>

                    <div class="col-md-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="email" autofocus>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>

                </div>




        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
            </form>
        </div>
    </div> <!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url({{ asset('website') }}/assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="{{ asset('website') }}/assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="{{ asset('website') }}/assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="{{ asset('website') }}/assets/img/app_store.svg" alt=""></a>
            </div>
        </div>
    </div>
</div> <!-- .banner-home -->

@include('website.footer')
