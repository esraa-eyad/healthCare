@include('website.header')

<!-- Back to top button -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>




<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet"/>

<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('Hospital.profile') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">All Appointment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">show information</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        @foreach($appointment as $name)
            @include('partials._errors')
            @include('partials._session')
        <div class="page-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 wow fadeInUp">
                        <h4 class="text-center mb-3">show all information appintment of {{$name->name}}</h4>


                    </div>
                </div>
                @endforeach
                @foreach($appointment as $appointment)
                    <form action="{{ route('createQr') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input value="{{$appointment->id}}" name="appointment_id" hidden>
                         <div class="container">
                            <div class="row">
                          <div class="col-12 mx-auto">
                            <ul class="list-group ">
                                <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                    <i class="fa fa-user"></i>
                                    <span class="pl-3">Name and National-ID</span>

                                    <span class="pl-3">{{$appointment->users->name}}</span>
                                    <span class="pl-3">{{$appointment->users->identity}}</span>

                                </li>
                                <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="pl-3">Mobile</span>

                                    <span class="pl-3">{{$appointment->users->mobile}}</span>
                                </li>
                                <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                    <i class="far fa-calendar-alt"></i>
                                    <span class="pl-3">
                                        {{$appointment->appointments_schedules->day}}
                                      </span>

                                    <span class="pl-3">
                                        {{$appointment->appointments_schedules->date}}
                                      </span>
                                </li>
                                <li class="list-group-item border-left-0 border-right-0 border-bottom-0 d-flex pl-0">
                                    <i class="fas fa-clock"></i>
                                    <span class="pl-3">
                                  {{$appointment->appointments_schedules->time}}
                            </span>
                                </li>



                                </li>
                                <li class="list-group-item border-left-0 border-right-0 border-bottom-0 d-flex pl-0">
                                    <i class="far fa-file-pdf"></i>
                                    <span class="pl-3">
                                    {{$appointment->vaccine->name}}


                                </li>
                                <li class="list-group-item border-left-0 border-right-0 border-bottom-0 d-flex pl-0">
                                    <i class="far fa-file-pdf"></i>
                                    <span class="pl-3">
                                        @foreach($answers as $answers)
                                    {{$answers->questions->question}}?{{$answers->answer}}
                                    <br><br>


                                    @endforeach
                                </li>
                                <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                    <i class="fas fa-check-circle"></i>

                                    <span class="pl-3">
                             <select class="browser-default custom-select" name="status" id="status" class="form-control">
                                      <option selected>status</option>

                                      <option value="0">disapproval</option>
                                    <option value="1">approval</option>

                                </select>

                                    </span>

                                </li>
                                <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="pl-3">

                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </span>

                                </li>


                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>



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




