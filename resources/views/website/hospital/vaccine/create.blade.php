@include('website.header')
<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('Hospital.profile') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vaccine.index') }}">show</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create Vaccine</h3>
                        </div>
                    </div>
                    @include('partials._errors')
                    @include('partials._session')
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ route('vaccine.store') }}" method="post" id="form" enctype="multipart/form-data">
                                  @csrf

                                    <div class="card-body">
                    <div class="form-group">
                        <label for="title">Name Vaccine</label>
                        <input type="name" name="name"  class="form-control" placeholder="Enter Name">
                    </div>
                                        <div class="form-group">
                                            <label for="title">Number Vaccine</label>
                                            <input type="name" name="numOfVaccine"  class="form-control" placeholder="Enter Number  ">
                                        </div>
                    <div class="checkbox checkbox-success">
                        <input name="available" id="available" type="checkbox" value="1">
                        <label for="test" style="padding-left: 15px!important;">available</label>
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
</div>

</div>
</div>
</div>
@include('website.footer')
