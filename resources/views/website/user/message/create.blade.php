@include('website.header')
<div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Contact</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Get in Touch</h1>

        <form action="{{ route('Message.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('partials._errors')
            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Name</label>

                    <input type="text" name="sender_id" value="{{$user}}" hidden>

                    <input type="text" name="name" id="fullName" class="form-control" placeholder="Full name..">
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email</label>
                    <select class="browser-default custom-select" name="reciever_id" id="reciever_id" class="form-control">
                        <option selected>Select category</option>
                        @foreach($hospitals as $hospital)
                            <option value=" {{ $hospital->id }} ">{{ $hospital->nameOfHospital }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
        </form>
    </div>
</div>






@include('website.footer')
