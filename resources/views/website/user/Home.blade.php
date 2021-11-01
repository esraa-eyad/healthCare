@include('website.header')
<style>
    @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    .isa_info, .isa_success, .isa_warning, .isa_error {
        margin: 10px 0px;
        padding:12px;

    }
    .isa_info {
        color: #00529B;
        background-color: #BDE5F8;
    }
    .isa_success {
        color: #4F8A10;
        background-color: #DFF2BF;
    }
    .isa_warning {
        color: #9F6000;
        background-color: #FEEFB3;
    }
    .isa_error {
        color: #D8000C;
        background-color: #FFD2D2;
    }
    .isa_info i, .isa_success i, .isa_warning i, .isa_error i {
        margin:10px 22px;
        font-size:2em;
        vertical-align:middle;
    }
</style>



<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">



                <div class="sidebar-block">
                        <div class="form-group">
                            <i class="fa fa-user"></i>
                            <span class="pl-3">Name and National-ID</span>

                            <span class="pl-3">{{$user->name}}</span>
                            <span class="pl-3">{{$user->identity}}</span>

                        </div>
                </div>
                @if($appointments->count() > 0)
                    @foreach ($appointments as $appointments)

                        @if($appointments->status == 1 and  $appointments->takeVaccine == 0)
                            <div class="isa_info">
                                <i class="fa fa-info-circle"></i>
                               you have a appointment
                                <span class="pl-3"></span>
                                    <a href="{{ route('qrCode', $appointments->id) }}">

                                    <img class="img-thumbnail w"  src="{{$appointments->qrcode}}"  >
                                </a>
                            </div>
                    @elseif($appointments->takeVaccine == 1)
                                <div class="isa_success">
                                    <i class="fa fa-check"></i>
                                    You Are Immune
                                </div>
                        @elseif($appointments->status == 0)
                            <div class="isa_warning">
                                <i class="fa fa-warning"></i>
                                Disapproved
                            </div>
                        @else
                        @endif
                    @endforeach
                @endif
            </div>



            @include('website.user.sidebar')



        </div>
    </div>
</div> <!-- .row -->
</div> <!-- .container -->
</div> <!-- .page-section -->

@include('website.footer')
