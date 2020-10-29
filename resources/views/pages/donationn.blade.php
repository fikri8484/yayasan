@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern page-header-sm bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <!-- <h1 style="color: black"><strong>Donasi</strong></h1> -->
                    <form action="/donasi/cari" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="Cari donasi..." name="cari" value="{{ old('cari') }}">
                        <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Cari">
                    </form>
                </div>

                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-right">
                        <li><a href="/">Home</a></li>
                        <li class="active">Donasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-1">
        <div class="row">
            @foreach($programs as $program)
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <a href="{{ route('detail-donation', $program->slug) }}">
                        <img class="card-img-top" src="{{ Storage::url($program->image) }}" alt="Card Image"> </a>
                    <div class="card-body">
                        @if ($program->donation_collected >= $program->donation_target)
                        <div class="badge badge-success">Terdanai <i class="fa fa-check"></i></div>
                        @endif
                        <a href="{{ route('detail-donation', $program->slug) }}" class="text-decoration-none">
                            <h4>{{ str_limit($program->brief_explanation, $limit = 62 ) }}</h4>
                        </a> <a><i class="icon-check icons"></i><span class="name"> {{ $program->category->category_name }}</span></a>
                        <div class="progress progress-xs">

                            <?php
                            $a = $program->donation_collected;
                            $b = $program->donation_target;
                            $c = 10;
                            $bar = $a . $c / $b;
                            ?>

                            <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$bar}}%">

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p style="text-align: center;"> <strong class="text-color-primary">
                                    <?php
                                    $akhir = \Carbon\Carbon::parse($program->time_is_up)->format('Y-m-d');
                                    $start_date = \Carbon\Carbon::now('Asia/Jakarta');
                                    $end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $akhir);
                                    $different_days = $start_date->diffInDays($end_date);
                                    ?>
                                    @if ($different_days == 0) Kurang dari 1 @else {{$different_days}} @endif
                                </strong> Hari lagi / Terkumpul <strong class="text-color-primary" style="text-align: right;"> @if ($program->donation_collected == 0)Rp 0
                                    @else
                                    @currency($program->donation_collected)
                                    @endif</strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {!! $programs->links() !!}

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