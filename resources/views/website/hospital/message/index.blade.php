
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
                        <li class="breadcrumb-item active" aria-current="page">All Messages</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="comment-form-wrap pt-5">
                    <h3 class="sidebar-title" class="mb-5">Show All Message</h3>

                    @include('partials._errors')
                    @include('partials._session')
                    <div class="table-responsive">
                        @if ($messages->count() > 0)

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>

                                <th scope="col">{{ __('Status') }}</th>


                                <th scope="col">{{ __('Create At') }}</th>


                                <th scope="col">{{ __('Show') }}</th>


                            </tr>

                            </thead>

                            @foreach($messages as $messages)

                                <tbody>

                                <tr>
                                    <td>{{$messages->id}}</td>

                                    <td>
                                        @if($messages->replay==null)
                                            <span class="free-badge">Not Replay</span>
                                        @else
                                            <span class="paid-badge">Replay</span>
                                        @endif

                                    </td>
                                    <td>{{$messages->created_at->format('d M, Y')}}</td>




                                    <td class="d-flex">
                                        <a href="{{ route('message.replay.show', [$messages->id]) }}" class="btn btn-me btn-success mr-1"> show </a>

                                    </td>
                                </tr>
                                </tbody>

                            @endforeach

                        </table>

                        @else

                            <h2 class="sidebar-title">No Found Messages</h2>

                        @endif


                    </div>
                </div>

            </div>


        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
