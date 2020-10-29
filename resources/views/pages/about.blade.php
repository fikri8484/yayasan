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
                    {{$about->description}}
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
@endsection