@include('website.header')
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consultation</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">consultation</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
<div class="page-section">
    <div class="row d-flex justify-content-center mt-100 mb-100">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Latest replay</h4>
                </div>
                <div class="comment-widgets">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="{{ asset('website') }}/assets/img/user.svg" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">{{$message->users->name}}</h6> <span class="m-b-15 d-block"> {{$message->message}} .</span>
                            <div class="comment-footer"> <span class="text-muted float-right">{{$message->created_at->format('d M, Y')}}</span>
                            </div>
                        </div>
                    </div> <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="{{ asset('website') }}/assets/img/hospital.svg" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">{{$message->hospitals->nameOfHospital}}</h6> <span class="m-b-15 d-block"> {{$message->replay}}. </span>
                            <div class="comment-footer"> <span class="text-muted float-right">{{$message->updated_at->format('d M, Y')}}</span>
                            </div>
                        </div>
                    </div> <!-- Comment Row -->

                </div> <!-- Card -->
            </div>
        </div>
    </div>
</div>




@include('website.footer')
