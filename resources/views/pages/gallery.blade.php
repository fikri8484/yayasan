@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern page-header-sm bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 style="color: black"><strong>Galeri</strong> Kami</h1>
                </div>

                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Galeri</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-2">
        <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">

            <li class="nav-item active" data-option-value="*">
                <a class="nav-link text-1 text-uppercase active" href="#">Semua</a>
            </li>
            @foreach ($category as $c)
            <li class="nav-item" data-option-value=".{{ $c->category }}">
                <a class="nav-link text-1 text-uppercase" href="#">{{ $c->category }}</a>
            </li>
            @endforeach
        </ul>

        <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
            <div class="row portfolio-list sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">

                @foreach($gallery as $g)
                <div class="col-md-6 col-lg-3 isotope-item {{ $g->gallery_category->category }}">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="{{ Storage::url($g->image) }}" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">{{ $g->title }}</span>
                                    <span class="thumb-info-type">{{ $g->gallery_category->category }}</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="{{ Storage::url($g->image) }}" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>
                @endforeach

                {!! $gallery->links() !!}

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