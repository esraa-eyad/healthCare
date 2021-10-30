@include('website.header')
<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">show vaccine</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="comment-form-wrap pt-5">

                    <h3 class="sidebar-title">Search</h3>

                    <form action="{{ route('ShowVaccine') }}" method="get">
                        <input type="text" name="search" class="form-control" placeholder="search " value="{{ request()->search }}">

                    </form>

                </div>

                <div class="comment-form-wrap pt-5">
                    <h3 class="sidebar-title" class="mb-5">index
                    </h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Vaccine</th>

                            <th scope="col">Hospital</th>
                            <th scope="col">available</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($vaccine as $vaccine)

                            <tr>
                            <td>{{$vaccine->name}}</td>
                            <td >{{$vaccine->hospitals->nameOfHospital ?? $vaccine->nameOfHospital}}</td>
                                @if($vaccine->numOfVaccine==0)
                            <td>Not available</td>
                               @else
                                    <td>available</td>

                                @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>


        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->




@include('website.footer')
