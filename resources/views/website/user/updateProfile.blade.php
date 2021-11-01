@include('website.header')

<!-- Back to top button -->



<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">update</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Update </h3>
                    @include('partials._errors')
                    @include('partials._session')

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="name">Name *</label>
                                <input name="name" value="{{$user->name}}" type="text" class="form-control" id="name">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email *</label>
                                <input   name="email" value="{{$user->email}}" type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">identity</label>
                            <input type="name" value="{{$user->identity}}" name="identity" class="form-control" id="website">
                        </div>
                        <div class="form-group">
                            <label for="password">User password<small class="text-info">(Enter password if you want change.)</small></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update Profile" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>



                    @include('website.user.sidebar')



                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->

@include('website.footer')
