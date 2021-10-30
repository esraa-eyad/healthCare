@include('website.header')


<div class="page-banner overlay-dark bg-image" style="background-image: url({{ asset('website') }}/assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">News</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach($posts as $post)

                    <div class="col-sm-6 py-3">
                        <div class="card-blog">
                            <div class="header">
                                <div class="post-category">
                                    <a href="#">Covid19</a>
                                </div>
                                <a href="{{ route('post.show', $post->slug) }}" class="post-thumb">
                                    <img src="{{$post->image}}" alt="">
                                </a>
                            </div>
                            <div class="body">
                                <h5 class="post-title"><a >{{$post->title}}</a></h5>
                                <div class="site-info">
                                    <div class="avatar mr-2">

                                        <span>{{$post->hospital->nameOfHospital}}</span>
                                    </div>
                                    <span class="mai-time"></span> {{ $post->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                    <div class="col-12 my-5">
                        <nav aria-label="Page Navigation">
                            <ul class="pagination justify-content-center">
                                {{ $posts->links() }}

                            </ul>
                        </nav>
                    </div>
                </div> <!-- .row -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">


                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Recent Blog</h3>
                        @foreach($lastPost as $lastPost)
                        <div class="blog-item">
                            <a class="post-thumb"  href="{{ route('post.show', $lastPost->slug) }}">
                                <img src="{{$lastPost->image}}" alt="">
                            </a>
                            <div class="content">
                                <h5 class="post-title"><a href="#">{{$lastPost->title}}</a></h5>
                                <div class="meta">
                                    <a href="#"><span class="mai-calendar"></span> {{ $lastPost->created_at->diffForHumans() }}</a>
                                    <a href="#"><span class="mai-person"></span> {{$lastPost->hospital->nameOfHospital}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="../assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .banner-home -->

@include('website.footer')
