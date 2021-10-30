@include('website.header')


<div class="page-section pt-8">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details">
                    <div class="post-thumb">
                        <img src="{{$post->image}}" alt="">
                    </div>
                    <div class="post-meta">
                        <div class="post-author">
                            <span class="text-grey">By</span> <a href="#">{{$post->hospital->nameOfHospital}}</a>
                        </div>
                        <span class="divider">|</span>
                        <div class="post-date">
                            <a href="#">{{ $post->created_at->format('d M, Y') }}</a>
                        </div>


                    </div>
                    <h2 class="post-title h1">{{ $post->title }}</h2>
                    <div class="post-content">
                        {!! $post->description  !!}
                    </div>

                </article>

            </div>
        </div>
    </div>

</div>

@include('website.footer')
