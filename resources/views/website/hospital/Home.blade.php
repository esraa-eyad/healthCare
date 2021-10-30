@include('website.header')
<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet"/>



<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-3 wow zoomIn">
                <div class="card-service">
                    <div class="circle-shape bg-secondary text-white">
                        <span class="fab fa-blogger-b"></span>
                    </div>
                    <p><span>Number Post</span> {{$count_post}}</p>
                </div>
            </div>
            <div class="col-md-6 py-3 wow zoomIn">
                <div class="card-service">
                    <div class="circle-shape bg-secondary text-white">
                        <span class="far fa-calendar-check"></span>
                    </div>
                    <p><span>Number Appointments</span> {{$count_Appointments}}</p>
                </div>
            </div>

        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="sidebar">


                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Your Pages</h3>
                        <div class="blog-item">

                            <div class="content">
                                <h5 class="post-title"><a href="{{ route('Hospital.profile') }}"><span class="mai-person"></span>settings</a></h5>

                            </div>
                        </div>
                        <div class="blog-item">

                            <div class="content">
                                <h5 class="post-title"><a  href="{{ route('vaccine.index') }}"><i class="fas fa-syringe"></i><span class="pl-1"></span> Add Vaccine</a></h5>

                            </div>
                        </div>
                        <div class="blog-item">

                            <div class="content">
                                <h5 class="post-title"><a href="{{ route('post.index') }}"><i class="fab fa-blogger-b"></i><span class="pl-1"></span>  Add Post</a></h5>

                            </div>
                        </div>
                        <div class="blog-item">

                            <div class="content">
                                <h5 class="post-title"><a href="{{ route('Schedule.index')}}"><span class="mai-calendar"></span> set
                                        schedule</a></h5>

                            </div>
                        </div>
                        <div class="blog-item">

                            <div class="content">
                                <h5 class="post-title"><a  href="{{ route('hospital.index')}}"><i class="far fa-calendar-check"></i><span class="pl-1"></span> Show All Appointment</a></h5>

                            </div>
                        </div>
                        <div class="blog-item">

                            <div class="content">
                                <h5 class="post-title"><a href="{{ route('showSure')}}"><span class="mai-calendar"></span>Appointment sure</a></h5>

                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="content">

                                <h5 class="post-title"><a  href="{{ route('message.hospital')}}"><span class="mai-chatbubbles"></span> message </a>



                                </h5>


                            </div>
                        </div>


                    </div>



                </div>

            </div>


        </div> <!-- .row -->
    </div> <!-- .container -->
</div>
<script>
    setInterval(function() {
        $("#notifications_count").load(window.location.href + " #notifications_count");
        $("#unreadNotifications").load(window.location.href + " #unreadNotifications");
    }, 5000);
</script>


@include('website.footer')


