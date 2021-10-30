@include('website.header')

<!-- Back to top button -->



<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">update</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Update </h3>
                    @include('partials._errors')
                    @include('partials._session')

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="name">Name *</label>
                                <input name="name" value="{{$user->name}}" type="text" class="form-control" id="name">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email *</label>
                                <input   name="email" value="{{$user->email}}" type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">identity</label>
                            <input type="name" value="{{$user->identity}}" name="identity" class="form-control" id="website">
                        </div>
                        <div class="form-group">
                            <label for="password">User password<small class="text-info">(Enter password if you want change.)</small></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update Profile" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>



                    @include('website.user.sidebar')



                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="../assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .banner-home -->
@include('website.footer')
