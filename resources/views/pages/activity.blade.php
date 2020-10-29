@extends('layouts.app')

@section('title', 'Kegiatan - SedekahJariah')

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
                        <li class="active">Kegiatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">
                    <h5 class="font-weight-bold pt-2">Kategori</h5>
                    <ul class="nav nav-list flex-column mb-5">

                        @foreach($tag as $tag)

                        <li class="nav-item">
                            <a class="nav-link">{{ $tag->tag }}</a>
                        </li>

                        @endforeach
                    </ul>
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts">

                    <div class="row px-3">
                        @foreach($activity as $a)
                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="{{ route('detail-kegiatan', $a->slug) }}">

                                        <img src="{{ $a->activity_gallery->count() ? Storage::url($a->activity_gallery->first()->image) : '' }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />

                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ route('detail-kegiatan', $a->slug) }}" style="color:black">{{ $a->title }}</a></h2>
                                    <p>{!! str_limit($a->description, $limit = 100) !!}</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> Admin </span>
                                        <span><i class="far fa-folder"></i>{{ $a->activity_tag->tag }}</a> </span>

                                        <span class="d-block mt-2"><a href="{{ route('detail-kegiatan', $a->slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    {!! $activity->render() !!}
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