@include('website.header')

<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List of Countries without Coronavirus case</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Create Post</h3>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                    </div>
                    @include('partials._errors')
                    @include('partials._session')


                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Post title</label>
                                            <input type="name" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <div style="max-width: 100px; max-height: 100px;overflow:hidden; margin-left: auto">
                                                        <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                      placeholder="Enter description">{{ $post->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->






@section('style')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="{{asset('adminLet') }}/summernote-0.8.18-dist/summernote-bs4.min.css">
@endsection

@section('script')
    <script src="{{asset('adminLet') }}/summernote-0.8.18-dist/summernote-bs4.min.js"></script>
    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 300
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>


    @include('website.footer')
