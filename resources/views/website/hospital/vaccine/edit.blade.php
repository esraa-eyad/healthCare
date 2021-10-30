@include('website.header')
<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">

                        <li class="breadcrumb-item"><a href="{{ route('Hospital.profile') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vaccine.index') }}">vaccine</a></li>

                        <li class="breadcrumb-item active" aria-current="page">update Vaccine</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Vaccine</h3>
                            <a href="" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                    </div>
                    @include('partials._errors')
                    @include('partials._session')
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{route('vaccine.update',$vaccine->id)}}" method="post">

                                    {{ csrf_field() }}
                                    {{ method_field('put') }}

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Name Vaccine</label>
                                            <input type="name" name="name"  value="{{$vaccine->name}}" class="form-control" placeholder="Enter Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Name Vaccine</label>
                                            <input type="name" name="numOfVaccine"  value="{{$vaccine->numOfVaccine}}" class="form-control" placeholder="Enter Name">
                                        </div>
                                        <div class="checkbox checkbox-success">
                                            @if($vaccine->numOfVaccine == 0)
                                            <input name="available" id="available" type="checkbox" value="0">
                                            <label for="test" style="padding-left: 15px!important;">unavailable</label>
                                            @else
                                                <input name="available" id="available" type="checkbox" value="1" checked>
                                                <label for="test" style="padding-left: 15px!important;">available</label>
                                            @endif
                                        </div>



                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>           </div>

        </div>
    </div>

