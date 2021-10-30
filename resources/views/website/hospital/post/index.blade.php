@include('website.header')


<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item active" aria-current="page">index</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">index <a class="btn btn-primary ml-lg-3" href="{{ route('post.create') }}">{{ __('create') }}</a>
                    </h3>
                    @include('partials._errors')
                    @include('partials._session')
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>

                                <th style="width: 10px">#</th>
                                <th>Image</th>
                                <th>Title</th>

                                <th>Author</th>
                                <th style="width: 130px">Created Date</th>
                                <th style="width: 40px">Actions</th>

                            </tr>

                            </thead>

                                <tbody>
                                @if($posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>
                                                @if($post->image)
                                                    <img height="50" class="card-img-top"  src="{{ $post->image}}"
                                                         alt="Card image cap">
                                                @else
                                                    <img height="80" class="card-img-top" src="{{ asset('website/images/user.png') }}" alt="Card image cap">

                                                @endif
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->hospital->nameOfHospital }}</td>


                                            <td style="width: 130px">{{ $post->created_at->format('d M, Y') }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('post.show',[$post->slug]) }}" class="btn btn-sm btn-success mr-1"> show </a>
                                                <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-sm btn-primary mr-1"> edit </a>
                                                <form action="{{ route('post.destroy', [$post->id]) }}" class="mr-1" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"> Delete </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No posts found.</h5>
                                        </td>
                                    </tr>
                                @endif

                                </tbody>


                        </table>


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


    <footer class="page-footer">
        <div class="container">

            <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
        </div>
    </footer>
