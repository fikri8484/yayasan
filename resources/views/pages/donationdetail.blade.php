@extends('layouts.app')

@section('title', 'Detail-Donasi')

@section('content')
<div role="main" class="main">

    <div class="container py-4">
        <div class="row">
            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}" style="height: 510px">

                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="{{ Storage::url($program->image) }}" class="img-fluid border-radius-0" alt="" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-color-dark font-weight-normal text-5 mb-2">
                                Donasi
                                <strong class="font-weight-extra-bold">{{ $program->title }}</strong>
                            </h2>
                            <h6><i class="text-color-grey">{{ $program->brief_explanation }}</i></h6>
                            <h4 style="text-align: center;"> <strong class="text-color-secondary">{{$different_days}}</strong> Hari lagi /
                                <strong class="text-color-secondary" style="text-align: right;"> @currency($program->donation_collected)</strong> Terkumpul dari @currency($program->donation_target)</h4>
                        </div>
                    </div>


                    <?php
                    $a = $program->donation_collected;
                    $b = $program->donation_target;
                    $c = 10;
                    $bar = $a . $c / $b;
                    ?>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{$bar}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$bar}}%">
                        </div>
                    </div>
                    @if ($program->donation_collected >= $program->donation_target)
                    <button class="btn mb-4" style="width: 100%; height: 100%; background-color:#7f8c8d;">

                        <h4 style="color: whitesmoke" class="pt-2">
                            ~ Donasi Ditutup ~
                        </h4>

                    </button>

                    @else
                    <a href="/donasi/{{$program->slug}}/form" class="btn btn-secondary mb-4" style="width: 100%; height: 100%;">
                        <h4 style="color: whitesmoke" class="pt-2">
                            Donasi Sekarang
                        </h4>
                    </a>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item active">
                            <a class="nav-link" href="#keterangan" data-toggle="tab">Keterangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#caradonasi" data-toggle="tab">Cara Donasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#berita" data-toggle="tab">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#donatur" data-toggle="tab">Donatur</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div id="keterangan" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-7 mb-4 mb-md-0">
                                    <h2 class="text-color-dark font-weight-normal text-5 mb-2">

                                        <strong class="font-weight-extra-bold">{{ $program->brief_explanation }}</strong>
                                    </h2>

                                    <p>
                                        {!! $program->description !!}
                                    </p>


                                </div>
                                <div class="col-md-5">
                                    <ul class="list list-icons list-primary list-borders text-2">
                                        <li>
                                            <i class="fas fa-caret-right left-10"></i>
                                            <strong class="text-color-primary">Jumlah Donatur yang Telah Berdonasi:</strong>
                                            <strong class="text-color-secondary">
                                                <?php
                                                $total = $program->donation_confirmation->where('donation_status', 'SUKSES')->count()
                                                ?>
                                                {{$total}}


                                            </strong>
                                        </li>
                                        <li>
                                            <i class="fas fa-caret-right left-10"></i>
                                            <strong class="text-color-primary">Open Donation:</strong>
                                            {{ $create }}
                                        </li>
                                        <li>
                                            <i class="fas fa-caret-right left-10"></i>
                                            <strong class="text-color-primary">Close Donation:</strong>
                                            {{ $time_is_up }}
                                        </li>

                                    </ul>
                                    <strong class="text-uppercase text-1 mr-3 text-dark float-left position-relative top-2">Share</strong>
                                    <ul class="social-icons">
                                        <li class="social-icons-facebook">
                                            <a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="social-icons-twitter">
                                            <a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="social-icons-linkedin">
                                            <a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="donatur" class="tab-pane">

                            @foreach($program->donation_confirmation->where('donation_status','SUKSES')->sortByDesc('id') as $donatur)
                            <blockquote class="with-borders">
                                <div class="sample-icon">
                                    <a><i class="icon-user icons"></i><span class="name"> {{ $donatur->donor_name }}</span> ~ <i>{{$donatur->updated_at->diffForHumans()}}</i></a>
                                </div>
                                <p>
                                    Berdonasi Sebesar <strong>@currency($donatur->nominal_donation)</strong> <br />
                                    <i>{{ $donatur->support }}</i>

                                </p>
                            </blockquote>
                            @endforeach
                        </div>

                        <div id="caradonasi" class="tab-pane">
                            <div class="row">
                                <div class="col">
                                    <p><b> Untuk teman-teman yang ingin ambil bagian dalam kebaikan ini, silahkan berdonasi dengan cara: </b><br>

                                        1. Klik tombol <b>“DONASI SEKARANG” </b><br>

                                        2. Silahkan isi identitas diri atau bisa Login terlebih dahulu <br>

                                        3. Pilih nominal donasi dan Bank yang akan menjadi tujuan transferan donasi anda, lalu klik tombol <b>"LANJUTKAN DONASI"</b> <br>
                                        4. Silahkan Transfer donasi sesuai arahan (dengan kode unik yang diberikan) <br>
                                        5. Silahkan kirim foto atau screenshot bukti donasi anda <br>

                                        Terimakasih atas doa, dukungan dan bantuannya, semoga Allah membalas semua kebaikan teman-teman.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="berita" class="tab-pane">
                            <div class="row">
                                <div class="col">
                                    <h4 class="mb-2">Berita Perkembangan Donasi</h4>
                                    <?php
                                    $totalDev = $program->developments->count();
                                    $i = $totalDev;
                                    ?>
                                    <div class="process process-vertical py-4">
                                        @foreach($program->developments->sortByDesc('id') as $dev)
                                        <div class="process-step appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                            <div class="process-step-circle">
                                                <strong class="process-step-circle-content">{{$i--}}</strong>
                                            </div>

                                            <div class="process-step-content">
                                                <h4 class="mb-1 text-4 font-weight-bold">{{$dev->title}}</h4>
                                                <p><i>{{$dev->time}}</i></p>
                                                <p class="mb-0">{!! $dev->description !!}</p>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection