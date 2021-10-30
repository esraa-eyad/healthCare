
@include('website.header')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('Hospital.profile') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">all appointment</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="comment-form-wrap pt-5">

                    <h3 class="sidebar-title">Search</h3>

                    <form action="{{ route('hospital.index') }}" method="get">
                        <input type="text" name="search" class="form-control" placeholder="Enter National-ID " value="{{ request()->search }}">

                    </form>

                </div>

                <div class="comment-form-wrap pt-5">
                    <h3 class="sidebar-title" class="mb-5">Show All Appointments</h3>

                    @include('partials._errors')
                    @include('partials._session')
                    <div class="table-responsive">
                        @if ($appointments->count() > 0)

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('National-ID') }}</th>

                                <th scope="col">{{ __('Name') }}</th>

                                <th scope="col">{{ __('Creation Date') }}</th>

                                <th scope="col">{{ __('status') }}</th>


                                <th scope="col">{{ __('show') }}</th>
                                <th scope="col">{{ __('delete') }}</th>


                            </tr>

                            </thead>

                            @foreach($appointments as $appointments)

                                <tbody>

                                <tr>
                                    <td>{{$appointments->users->identity}}</td>

                                    <td>{{$appointments->users->name}}</td>




                                    <td>{{$appointments->created_at->diffForHumans()}}</td>
                                    @if($appointments->status == '3')
                                    <td>  <span style="margin-left: 10px; font-weight: 500;" class="=">Waiting</span> </td>
                                    @elseif($appointments->status == '1')
                                        <td> <span class="badge badge-success">approval</span> </td>
                                    @else
                                        <td> <span class="badge badge-danger">disapproval</span> </td>
                                     @endif
                                        <td class="d-flex">
                                        <a href="{{ route('hospital.show', [$appointments->id]) }}" class="btn btn-me btn-success mr-1"> show </a>

                                    </td>
                                </tr>
                                </tbody>

                            @endforeach

                        </table>

                        @else

                            <h2 class="sidebar-title">No Found Appointments</h2>

                        @endif


                    </div>
                </div>

            </div>


        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var takeVaccine = $(this).prop('checked') == true ? 1 : 0;
            var appointment_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/takeVaccine',
                data: {'takeVaccine': takeVaccine, 'appointment_id': appointment_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    })
</script>
