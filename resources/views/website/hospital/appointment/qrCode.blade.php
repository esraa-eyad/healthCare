<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/maicons.css">

    <link rel="stylesheet" href="{{ asset('website') }}//assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('website') }}//assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="{{ asset('website') }}/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/theme.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet"/>
</head>
<div class="page-banner overlay-dark bg-image" style="background-image: url({{ asset('website') }}/assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <h1 class="font-weight-normal">Health Care</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
<div class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp">
                <h4 class="text-center mb-3">Appointment Code</h4>
                <center><img src="{{$appointment->qrcode}}" alt="centered image" > </center>


                </div>
            </div>

        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <ul class="list-group ">
                        <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                            <i class="fa fa-user"></i>
                            <span class="pl-3">Name and National-ID</span>

                            <span class="pl-3">{{$appointment->users->name}}</span>
                            <span class="pl-3">{{$appointment->users->identity}}</span>
                            
                        </li>
                        <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                            <i class="fa fa-phone"></i>
                            <span class="pl-3">mobile</span>


                            <span class="pl-3">{{$appointment->users->mobile}}</span>

                        </li>
                        <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="pl-3">Location</span>

                            <span class="pl-3">{{$appointment->hospitals->nameOfHospital}}</span>
                        </li>
                        <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                            <i class="far fa-calendar-alt"></i>
                            <span class="pl-3">
                                {{$appointment->appointments_schedules->day}}
                                {{$appointment->appointments_schedules->date}}

                            </span>

                        </li>
                        <li class="list-group-item border-left-0 border-right-0 border-bottom-0 d-flex pl-0">
                            <i class="fas fa-clock"></i>
                            <span class="pl-3">{{$appointment->appointments_schedules->time}}

                            </span>
                        </li>
                        <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                            <i class="fas fa-check-circle"></i>
                            <span class="pl-3">Type Vaccien</span>

                            <span class="pl-3"> {{$appointment->vaccine->name}}


                            </span>

                        </li>
                    </ul>
                </div>
            </div>
        </div>


        </div>
    </div>
</div>
