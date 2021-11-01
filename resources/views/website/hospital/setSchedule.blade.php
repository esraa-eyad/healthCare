@include('website.header')
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap library -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="js/bootstrap-datetimepicker.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('Hospital.profile') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Set Schedule</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                @include('partials._errors')
                @include('partials._session')
                <form action="{{ route('Schedule.store') }}" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @include('partials._errors')
                    @include('partials._session')
                    <div class="container">
                        <div class='col-md-5'>
                            <div class="form-group">

                                <input type="date" name="date" class="form-control">
                            </div>

                            <div class="form-group">

                                <input type="time" name="time" class="form-control">

                            </div>
                            <div class="form-group">

                                <input type="text" placeholder="number of available" name="NumOfAvailable" class="form-control" >
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                </div>
                        </div>
                    </div>
                </form>

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Appointment </h3>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>

                                <th style="width: 10px">#</th>
                                <th>Day</th>

                                <th>Date</th>
                                <th>Time</th>

                                <th style="width: 40px">Actions</th>

                            </tr>

                            </thead>

                            <tbody>

                            @if($schedule->count())
                                <?php $i = 0 ?>


                                    @foreach ($schedule as $schedule)
                                        @if($schedule->expire==0)


                                            <?php $i++ ?>

                                    <tr>
                                        <td>{{ $i}}</td>
                                        <td>{{ $schedule->day }}</td>

                                        <td>
                                            {{$schedule->date }}

                                        </td>
                                        <td>{{$schedule->time}}</td>

                                        <td class="d-flex">

                                            <form action="{{ route('Schedule.destroy',[$schedule->id])}}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                        @endif

                                    @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No found.</h5>
                                    </td>
                                </tr>
                            @endif

                            </tbody>


                        </table>


                    </div>

                </div>
            </div>
            @include('website.hospital.sidebar')
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->



@include('website.footer')
