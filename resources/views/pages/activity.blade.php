@extends('layouts.app')

@section('title', 'Kegiatan')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern page-header-sm bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 style="color: black"><strong>Kegiatan</strong> Kami</h1>
                </div>

                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-right">
                        <li><a href="#">Home</a></li>
                        <li class="active" style="color: #f26506">Kegiatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">
                    <h5 class="font-weight-bold pt-2">Categories</h5>
                    <ul class="nav nav-list flex-column mb-5">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Design (2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Photos (4)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Videos (3)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lifestyle (2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Technology (1)</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts">

                    <div class="row px-3">

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="/kegiatandetail">
                                        <img src="img/projects/project-short.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="/kegiatandetail">Amazing Mountain</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">Bob Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="/kegiatandetail" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-2.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Creative Business</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-3.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Unlimited Ways</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-4.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Developer Life</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">Jessica Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-5.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">The Blue Sky</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">Robert Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-6.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Night Life</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">Robert Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-7.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">Another World Perspective</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="img/blog/medium/blog-8.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html">The Creative Team</a></h2>
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">Robert Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>

                                        <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection