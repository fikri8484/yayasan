@extends('layouts.app')

@section('title', 'detail-kegiatan')

@section('content')
<div role="main" class="main">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">
                    <h5 class="font-weight-bold pt-4">Kategori</h5>
                    <ul class="nav nav-list flex-column mb-5">

                        @foreach ($tag as $tag)
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ $tag->tag }}</a>
                        </li>
                        @endforeach

                    </ul>
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="row">
                            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}" style="height: 510px">


                                    @foreach($activity->activity_gallery as $g)
                                    <div>
                                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                            <img src="{{ Storage::url($g->image) }}" class="border-radius-0" alt="" />
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>

                        <div class="post-date ml-0">
                            <span class="day bg-color-grey"></span>
                            <span class="month">{{ $activity->time }}</span>

                        </div>

                        <div class="post-content ml-0">
                            <h2 class="font-weight-bold">
                                {{ $activity->title }}
                            </h2>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i>Admin
                                </span>
                                <span><i class="far fa-folder"></i>
                                    <a href="#">{{ $activity->activity_tag->tag }}</a>
                                </span>
                            </div>

                            <p>
                                {{ $activity->description }}
                            </p>



                            <div class="post-block mt-5 post-share">
                                <h4 class="mb-3">Share this Post</h4>

                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                    <!-- <a class="addthis_button_tweet"></a> -->
                                    <a class="addthis_button_pinterest_pinit"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                                <!-- AddThis Button END -->
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection