@extends('layouts.app')

@section('title', 'Tentang Kami - SedekahJariah')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern page-header-sm bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 style="color: black"><strong>Tentang</strong> Kami</h1>
                </div>

                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-right">
                        <li><a href="/">Home</a></li>
                        <li class="active">Tentang</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @foreach ($about as $about)
    <div class="container">
        <div class="row py-4 mb-2">
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">
                        {{$about->title}}
                    </h2>
                </div>
                <div class="overflow-hidden mb-3"></div>
                <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                    {!! $about->description !!}
                </p>
                <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" />
                <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                    <div class="col-sm-6 text-lg-right my-4 my-lg-0">
                        <strong class="text-uppercase text-1 mr-3 text-dark">follow me</strong>
                        <ul class="social-icons float-lg-right">
                            <li class="social-icons-facebook">
                                <a href="{{$about->fb}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            @foreach ($contact as $contact)
                            <li class="social-icons-whatsapp">
                                <a href="https://api.whatsapp.com/send?phone={{$contact->number}}&text={{$contact->message}}
" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                <img src="{{ Storage::url($about->image1) }}" class="img-fluid mb-2" alt="" />
            </div>
        </div>
    </div>
    @endforeach
</div>

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
@endsection