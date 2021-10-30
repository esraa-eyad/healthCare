@include('website.header')
<div class="page-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="row">

                    <div class="col-md-6 col-lg-6 py-3 wow zoomIn">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="{{ asset('website') }}/assets/img/user.svg"  alt="">

                            </div>
                            <div class="body">

                                <a class="btn btn-primary ml-lg-3" href="{{ route('register')}}">{{ __('register') }}</a>
                                <a class="btn btn-primary ml-lg-3" href="{{ route('login')}}">{{ __('Login') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 py-3 wow zoomIn">
                        <div class="card-doctor">
                            <div class="header">
                                <img src="{{ asset('website') }}/assets/img/hospital.svg"  alt="">

                            </div>
                            <div class="body">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('hospital.register')}}">{{ __('register') }}</a>
                                <a class="btn btn-primary ml-lg-3" href="{{ route('hospital.login')}}">{{ __('Login') }}</a>

                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->


@include('website.footer')
