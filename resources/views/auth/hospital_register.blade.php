@include('website.header')


<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Registered Hospital </h1>
        @include('partials._errors')

        <form method="POST" action="{{ url("register/hospital") }}" aria-label="{{ __('Register') }}">

            @csrf

            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input  placeholder="nameOfHospital...." id="nameOfHospital" type="text" class="form-control @error('nameOfHospital') is-invalid @enderror" name="nameOfHospital" value="{{ old('nameOfHospital') }}" required autocomplete="nameOfHospital" autofocus>

                    @error('nameOfHospital')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input  placeholder="mobile...." id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input  placeholder="Email...." id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input placeholder="Password...." id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input placeholder="password confirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

            </div>



            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div> <!-- .page-section -->


@include('website.footer')
