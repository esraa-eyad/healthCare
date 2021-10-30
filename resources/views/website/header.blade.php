<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title> Health Care</title>


    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/maicons.css">
    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/maicons.css">

    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('website') }}//assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="{{ asset('website') }}/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="{{ asset('website') }}/assets/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>



<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-dribbble"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-primary">Automatic Vaccine Distribution  </span>System</a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <lu class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">News</a>
                    </li>

                    @if(Auth::guard('hospital')->check())

                        <li class="nav-item dropdown" >
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                {{Auth::guard('hospital')->user()->nameOfHospital}} <span class="caret"></span>

                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header"></span>

                                <a href="{{ route('hospital.home') }}" class="dropdown-item">
                                    <i class="fas fa-home"></i>

                                    Home
                                </a>


                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('Hospital.profile') }}" class="dropdown-item">
                                        <i class="mai-person"></i>
                                        Profile
                                    </a>


                                <div class="dropdown-divider"></div>
                                <a  class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <div class="content" id="notifications_count">

                        <li  class="nav-item dropdown" >
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-bell"></i>
                                <span  class="badge badge-warning navbar-badge">{{Auth::guard('hospital')->user()->unreadNotifications->count() }}
                                     </span>
                            </a>
                            <div id="unreadNotifications">

                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header">{{ Auth::guard('hospital')->user()->unreadNotifications->count() }}Notifications</span>
                                @foreach (Auth::guard('hospital')->user()->unreadNotifications as $notification)

                                <div class="dropdown-divider"></div>
                                <a data-id="{{$notification->id}}" href="{{ route('message.replay.show',[$notification->data['id']]) }}" class="dropdown-item change">
                                    <i class="fas fa-envelope mr-2"></i>{{ $notification->data['title'] }} From {{ $notification->data['user'] }}
                                    <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                </a>

                                @endforeach

                                <div class="dropdown-divider"></div>
                                <a href="\MarkAsRead_all" class="dropdown-item dropdown-footer">See All Notifications</a>
                               </div>
                            </div>
                        </li>
                        </div>
                    @else
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('userOrHospital')}}">Login / Register</a>
                            </li>

                            @if (Route::has('register'))

                            @endif
                        @else



                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        <i class="fas fa-home"></i>

                                        {{ __('home') }}
                                    </a>

                                <div class="dropdown-divider"></div>
                                <a  class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </div>
                            </li>
                            <div class="content" id="notifications_count_2">

                                <li  class="nav-item dropdown" >
                                    <a class="nav-link" data-toggle="dropdown" href="#">
                                        <i class="fas fa-bell"></i>
                                        <span  class="badge badge-warning navbar-badge">{{Auth::user()->unreadNotifications->count() }}
                                     </span>
                                    </a>
                                    @if(Auth::user()->unreadNotifications->count()==0)
                                        <div id="unreadNotifications">

                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                                <span class="dropdown-item dropdown-header">No Notifications</span>

                                           </div>
                                        </div>
                                     @else
                                        <div id="unreadNotifications">

                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <span class="dropdown-item dropdown-header">{{ Auth::user()->unreadNotifications->count() }}Notifications</span>
                                            @foreach (Auth::user()->unreadNotifications as $notification)

                                                <div class="dropdown-divider"></div>
                                                <a data-id="{{$notification->id}}" href="{{ route('qrCode',[$notification->data['id']]) }}" class="dropdown-item change2">
                                                    <i class="fas fa-envelope mr-2"></i>{{ $notification->data['title'] }}
                                                    <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                                </a>

                                            @endforeach

                                            <div class="dropdown-divider"></div>
                                            <a href="\MarkAsRead_all_user" class="dropdown-item dropdown-footer">See All Notifications</a>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                            </div>

                        @endguest

                    @endif
                </lu>
            </div>
        </div> <!-- .container -->
</header>


<script>
    $(".change").click(function() {
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: '/ReadNotification',
            data: {'id': id },

            success: function(data){
                console.log(data.success)
            }
        });
        console.log("kk")

    })
</script>
<script>
    $(".change2").click(function() {
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: '/ReadNotification2',
            data: {'id': id },

            success: function(data){
                console.log(data.success)
            }
        });

    })
</script>
<script>
    setInterval(function() {
        $("#notifications_count").load(window.location.href + " #notifications_count");

        $("#unreadNotifications").load(window.location.href + " #unreadNotifications");
    }, 5000);
</script>
<script>
    setInterval(function() {
        $("#notifications_count_2").load(window.location.href + " #notifications_count_2");
         $("#unreadNotifications_2").load(window.location.href + " #unreadNotifications");
    }, 5000);
</script>
