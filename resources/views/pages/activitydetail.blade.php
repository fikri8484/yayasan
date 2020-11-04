@extends('layouts.app')

@section('title', $activity->title)
@section('description', str_limit($activity->description, $limit = 70 ) )

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
                            <a class="nav-link" href="{{route('kegiatan.kategori', $tag->id)}}">{{ $tag->tag }}</a>
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
                            <span class="day bg-color-grey">{{ \Carbon\Carbon::parse($activity->time)->format('d') }}</span>
                            <span class="month">{{ \Carbon\Carbon::parse($activity->time)->format('M-y') }}</span>

                        </div>

                        <div class="post-content ml-0">
                            <h2 class="font-weight-bold">
                                {{ $activity->title }}
                            </h2>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i>Admin
                                </span>
                                <span><i class="far fa-folder"></i>
                                    {{ $activity->activity_tag->tag }}
                                </span>
                            </div>

                            <p>
                                {!! $activity->description !!}
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
@foreach ($about as $about)
<footer id="footer" class="mt-4">
    <div class="container">
        <div class="row pt-3 mt-4">
            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 pt-3">
                <h5 class="text-3 mb-3">Tentang Kami {{$about->title}}</h5>
                <p>{!! str_limit($about->description, $limit = 150) !!}</p>
                <p class="mb-0"><a href="{{ route('about') }}" class="btn-flat btn-xs text-color-light p-relative top-5"><strong class="text-2">Lihat Selengkapnya</strong><i class="fas fa-angle-right p-relative top-1 pl-2"></i></a></p>
            </div>
            <div class="col-md-5 col-lg-3 mb-5 mb-lg-0 pt-3">
                <h5 class="text-3 mb-2">Hubungi Kami</h5>
                <p class="text-5 text-color-light font-weight-bold">(+62) {{$about->whatsapp}}</p>
                <ul class="list list-icons list-icons-lg">
                    <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                        <p class="m-0">{{$about->address}}</p>
                    </li>
                    <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                        <p class="m-0">{{$about->email}}</p>
                    </li>
                    <li class="mb-1"><i class="fab fa-facebook text-color-primary"></i>
                        <p class="m-0"><a href="{{$about->fb}}">{{$about->title}}</a></p>
                    </li>
                </ul>
            </div>

            <div class="col-lg-5 pt-3">
                <div style="text-align: center;" class="mt-1">
                    <img alt="SedekahJariah" width="300" height="150" src="{{ url('img/logo11.png') }}" />
                </div>
                <p class="text-3 mb-3 pb-1" style="text-align: center;">SedekahJariah © Copyright 2020. All Rights Reserved.</p>
                <br><br>
            </div>
        </div>
    </div>
</footer>
@endforeach
@endsection