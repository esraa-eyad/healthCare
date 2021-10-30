@include('website.header')



<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Appointments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Appointments</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="comment-form-wrap pt-8">
                    <h3 class="mb-5">index <a class="btn btn-primary ml-lg-3" href="{{ route('appointments.create') }}">{{ __('create') }}</a>
                    </h3>
                    @include('partials._errors')
                    @include('partials._session')
                    <div class="table-responsive">
                        @if ($appointments->count() > 0)

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>

                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('identity') }}</th>
                                <th scope="col">{{ __('mobile') }}</th>
                                <th scope="col">{{ __('Name Hospital') }}</th>
                                <th scope="col">{{ __('day') }}</th>
                                <th scope="col">{{ __('time/date') }}</th>


                                <th scope="col">{{ __('status') }}</th>
                                <th scope="col">{{ __('QR') }}</th>


                            </tr>

                            </thead>

                            @foreach($appointments as $appointments)

                                <tbody>

                                <tr>
                                    <td>{{$appointments->users->name}}</td>



                                    <td>{{$appointments->users->identity}}</td>
                                    <td>{{ is_array($appointments->users->mobile) ?  implode( '-' , array_filter($appointments->users->mobile)) : $appointments->users->mobile }}</td>


                                    <td>{{$appointments->hospitals->nameOfHospital}}</td>
                                    <td>{{$appointments->appointments_schedules->day}}</td>
                                    <td>{{$appointments->appointments_schedules->time}}||{{$appointments->appointments_schedules->date}}</td>





                                    <td>
                                        @if($appointments->status == '3')
                                            <p class="text-warning">waiting</p>
                                         @elseif($appointments->status == '0')
                                            <p class="text-danger">disapproval</p>
                                        @else
                                            <p class="text-success">approval</p>

                                        @endif

                                    </td>
                                    @if($appointments->qrcode==null)
                                    <td></td>
                                    @else
                                        <td><a href="{{ route('qrCode', $appointments->id) }}">

                                                <img class="img-thumbnail w"alt=""  src="{{$appointments->qrcode}}"  >
                                            </a></td>

                                    @endif
                                </tr>
                                </tbody>

                            @endforeach

                        </table>

                        @else

                            <h2>No Found Appointments</h2>

                        @endif


                    </div>
                </div>

            </div>


        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
