@extends('layouts.app')

@section('title', $program->title)
@section('description', $program->brief_explanation)
@section('image', Storage::url($program->image))
@section('content')
<div role="main" class="main">

    @foreach($contact as $contact)
    <div class="tanyaAdmin">
        <a href="https://api.whatsapp.com/send?phone={{$contact->number}}&text={{$contact->message}}
" target="_blank"><button type="button" class="btn btn-primary btn-xl mb-2"><i class="fab fa-whatsapp"></i> |Tanya Admin</button></a>
    </div>
    @endforeach

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
                            <h4 style="text-align: center;"> <strong class="text-color-primary">{{$different_days}}</strong> Hari lagi /
                                <strong class="text-color-primary" style="text-align: right;"> @currency($program->donation_collected)</strong> Terkumpul dari @currency($program->donation_target)</h4>
                            <!-- <div class="d-sm-flex align-items-center justify-content-between px-3">
                                <h4><strong class="text-color-primary">{{$different_days}}</strong> Hari lagi</h4>
                                <h4><strong class="text-color-primary"> @currency($program->donation_collected)</strong> Terkumpul <br> dari @currency($program->donation_target)</h4>
                                </a>
                            </div> -->
                        </div>
                    </div>


                    <?php
                    $a = $program->donation_collected;
                    $b = $program->donation_target;
                    $c = 100;
                    $bar = $a * $c / $b;
                    ?>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="{{$bar}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$bar}}%">
                        </div>
                    </div>
                    @if ($program->donation_collected >= $program->donation_target)
                    <button class="btn mb-4" style="width: 100%; height: 100%; background-color:#7f8c8d;">

                        <h4 style="color: whitesmoke" class="pt-2">
                            ~ Donasi Ditutup ~
                        </h4>

                    </button>
                    @elseif ($program->is_published == 0)
                    <button class="btn mb-4" style="width: 100%; height: 100%; background-color:#7f8c8d;">

                        <h4 style="color: whitesmoke" class="pt-2">
                            ~ Donasi Ditutup ~
                        </h4>

                    </button>

                    @else
                    <a href="/donasi/{{$program->slug}}/form" class="btn btn-primary mb-4" style="width: 100%; height: 100%;">
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
                            <a class="nav-link" href="#keterangan" data-toggle="tab" style="font-size: 10px;">Keterangan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#caradonasi" data-toggle="tab" style="font-size: 10px;">CaraDonasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#berita" data-toggle="tab" style="font-size: 10px;">Berita</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $total = $program->donation_confirmation->where('donation_status', 'SUKSES')->count()
                            ?>
                            <a class="nav-link" href="#donatur" data-toggle="tab" style="font-size: 10px;">Donatur({{$total}}) </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div id="keterangan" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-7 mb-4 mb-md-0">

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
                                    <!-- <strong class="text-uppercase text-1 mr-3 text-dark float-left position-relative top-2">Share</strong> -->
                                    <!-- <ul class="social-icons">
                                        <li class="social-icons-facebook">
                                            <a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="social-icons-twitter">
                                            <a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="social-icons-linkedin">
                                            <a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul> -->
                                    <div class="post-block mt-0 post-share">
                                        <h4 class="mb-3">Bagikan Program Donasi Ini</h4>

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
                            </div>
                        </div>
                        <div id="donatur" class="tab-pane">
                            {!! $program->donation_confirmation->where('donation_status' , 'SUKSES')->count() ? '' : 'Belum ada Donatur, <b>Ayo Jadi Donatur yang Pertama!</b> '!!}
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
                                        4. Silahkan Transfer donasi sesuai arahan (sesuai dengan kode unik yang diberikan) <br>
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
                                    $awal = 1;
                                    ?>
                                    <div class="process process-vertical py-4">
                                        {{ $program->developments->count() ? '' : 'Belum ada Berita Perkembangan Donasi'}}

                                        @foreach($program->developments->sortByDesc('id') as $dev)
                                        <div class="process-step appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                            <div class="process-step-circle">
                                                <strong class="process-step-circle-content">{{$i--}}</strong>
                                            </div>

                                            <div class="process-step-content">
                                                <h4 class="mb-1 text-4 font-weight-bold">{{$dev->title}}</h4>
                                                <p><i>{{ \Carbon\Carbon::parse($dev->time)->format('d, M-Y') }}</i></p>
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
@push('prepend-style')
<style>
    .tanyaAdmin {
        position: fixed;
        bottom: 0;
        right: 0;
        float: left;
        margin-right: 20px;
        margin-bottom: 30px;
        z-index: 99;
    }
</style>
@endpush