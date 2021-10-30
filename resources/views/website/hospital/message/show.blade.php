@include('website.header')
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('Hospital.profile')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consultation</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">consultation</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
<div class="container mt-5">
    <form action="{{ route('message.replay',$message->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('partials._errors')
        <input type="text" name="id"  value=" {{$message->id}}" hidden>

        <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{ asset('website') }}/assets/img/user.svg" width="40">

                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$message->users->name}}</span><span class="date text-black-50">{{$message->created_at->format('d M, Y')}}</span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">{{$message->message}}</p>
                    </div>
                </div>
                @if($message->replay==null)

                <div class="bg-white p-2">

                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="{{ asset('website') }}/assets/img/hospital.svg" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">  <span class="d-block font-weight-bold name">{{$message->hospitals->nameOfHospital}}</span> </div>
                        <textarea name="replay" class="form-control ml-1 shadow-none textarea"></textarea></div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary wow zoomIn">Send Replay</button>
                    </div>

                </div>
                @else
                <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{ asset('website') }}/assets/img/hospital.svg" width="40">

                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$message->hospitals->nameOfHospital}}</span><span class="date text-black-50">{{$message->updated_at->format('d M, Y')}}</span></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text" >{{$message->replay}}</p>
                        </div>
                    </div>



                @endif
            </div>
        </div>
    </div>

    </form>
</div>






@include('website.footer')
