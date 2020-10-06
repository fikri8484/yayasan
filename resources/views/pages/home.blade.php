@extends('layouts/app')
@section('title', 'Beranda')
@section('content')
<div role="main" class="main">
    <div class="slider-container rev_slider_wrapper" style="height: 650px">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 650, 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
            <ul>
                <li data-transition="fade" class="slide-overlay slide-overlay-level-8">
                    <img src="img/slides/quran.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" />

                    <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-x="center" data-y="center" data-voffset="['-55','-55','-55','-55']" data-fontsize="['50','50','50','90']" data-lineheight="['55','55','55','95']" data-letterspacing="-1" style="font: calibri">
                        وَمَا تُنفِقُوا۟ مِنْ خَيْرٍ فَإِنَّ ٱللَّهَ بِهِۦ عَلِيمٌ
                    </h1>

                    <div class="tp-caption font-weight-light text-center" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-x="center" data-y="center" data-voffset="['-5','-5','-5','15']" data-fontsize="['18','18','18','50']" data-lineheight="['29','29','29','40']" style="color: #b5b5b5">
                        <strong>Dan apa saja harta yang baik yang kamu nafkahkan (di jalan
                            Allah),</strong>
                        maka sesungguhnya Allah Maha Mengetahui
                    </div>

                    <a class="tp-caption btn btn-light-2 btn-outline font-weight-semibold" data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-hash data-hash-offset="85" href="{{ route('donation') }}" data-x="center" data-hoffset="0" data-y="center" data-voffset="['65','65','65','105']" data-whitespace="nowrap" data-fontsize="['15','15','15','33']" data-paddingtop="['15','15','15','40']" data-paddingright="['45','45','45','110']" data-paddingbottom="['15','15','15','40']" data-paddingleft="['45','45','45','110']">Donasi Sekarang</a>
                </li>
                <li data-transition="fade" class="slide-overlay slide-overlay-level-8">
                    <img src="img/slides/masjid.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" />

                    <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2" data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-x="center" data-y="center" data-voffset="['-55','-55','-55','-55']" data-fontsize="['50','50','50','90']" data-lineheight="['55','55','55','95']" data-letterspacing="-1" style="font: calibri">
                        <strong>Siapkan Sedekah Terbaikmu disini!</strong>
                    </h1>
                    <br /><br />

                    <div class="tp-caption font-weight-light text-center" data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' data-x="center" data-y="center" data-voffset="['-5','-5','-5','15']" data-fontsize="['18','18','18','50']" data-lineheight="['29','29','29','40']" style="color: #b5b5b5">
                        Kalian sekali-kali tidak akan mencapai kebajikan yang sempurna
                        <br />
                        hingga kalian menafkahkan sebagian harta yang kalian cintai.”
                        (QS. Ali-‘Imran : 92)
                    </div>

                    <a class="tp-caption btn btn-light-2 btn-outline font-weight-semibold" data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"opacity:0;y:50%;","to":"o:1;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]' data-hash data-hash-offset="85" href="{{ route('donation') }}" data-x="center" data-hoffset="0" data-y="center" data-voffset="['65','65','65','105']" data-whitespace="nowrap" data-fontsize="['15','15','15','33']" data-paddingtop="['15','15','15','40']" data-paddingright="['45','45','45','110']" data-paddingbottom="['15','15','15','40']" data-paddingleft="['45','45','45','110']">Donasi Sekarang</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- <section class="section section-quaternary mb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h4 class="mb-0">
                        وَمَنْ يُوْقَ شُحَّ نَفْسِهِ فَأُلَئِكَ هُمُ الْمُفْلِحُوْنَ
                    </h4>
                    <p class="mb-0">Barangsiapa yang dijauhkan dari sifat kikir dirinya, <br />
                        mereka itulah orang-orang yang beruntung.” (QS. Al-Hasyr :
                        9)</p>
                </div>
            </div>
        </div>
    </section> -->


    <!-- <br><br><br> -->
    <div class="container pt-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 pb-sm-4 pb-lg-0 pr-lg-5 mb-sm-5 mb-lg-0">
                <h2 class="text-color-dark font-weight-normal text-6 mb-2">
                    Yayasan
                    <strong class="font-weight-extra-bold">Abdurraman bin Auf</strong>
                </h2>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit massa
                    enim. Nullam id varius nunc.
                </p>
                <p class="pr-5 mr-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus blandit massa enim. Nullam id varius nunc. Vivamus
                    bibendum magna ex, et faucibus lacus venenatis eget
                </p>
                <a href="{{ route('about') }}" class="btn btn-primary font-weight-semibold btn-px-4 btn-py-2 text-2">Lihat Selengkapnya</a>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 mt-sm-5" style="top: 1.7rem">
                <img src="img/generic/generic-corporate-3-1.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%" alt="" />
                <img src="img/generic/generic-corporate-3-2.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation" data-appear-animation="expandIn" style="top: -33%; left: -29%" alt="" />
                <img src="img/generic/generic-corporate-3-3.jpg" class="img-fluid position-relative appear-animation mb-2" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" />
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <div class="col">
                <hr class="my-5 bg-color-grey size=" 50" style="height: 4px" />
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="font-weight-normal text-6 mb-5 text-color-dark">
                    <strong class="font-weight-extra-bold">Donasi</strong> Pilihan
                </h2>
            </div>

            @foreach($program as $program)
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
                            <p style="text-align: center;"> <strong class="text-color-primary">14</strong> Hari lagi / Terkumpul <strong class="text-color-primary" style="text-align: right;"> @if ($program->donation_collected == 0)Rp 0
                                    @else
                                    @currency($program->donation_collected)
                                    @endif</strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
            <div class="col-lg-12 text-center">
                <a href="{{ route('donation') }}" class="btn btn-primary mt-3">Lihat Semua Donasi </a>
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{ route('donation') }}" class="btn btn-primary btn-px-5 btn-py-2 font-weight-bold text-color-light rounded-0 text-2">Lihat Semua Donasi</a>
            </div>
        </div>


    </div>
    <br /><br />
    <section class="section section-no-border m-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="font-weight-normal text-6 mb-5 text-color-dark">
                        <strong class="font-weight-extra-bold">Galleri</strong> Kami
                    </h2>
                </div>
            </div>

            <div class="row portfolio-list sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                @foreach($gallery as $gallery)
                <div class="col-md-6 col-lg-3 isotope-item brands">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="{{ Storage::url($gallery->image) }}" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">{{ $gallery->title }}</span>
                                    <span class="thumb-info-type">{{ $gallery->gallery_category->category }}</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="{{ Storage::url($gallery->image) }}" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{ route('gallery') }}" class="btn btn-primary btn-px-5 btn-py-2 font-weight-bold text-color-light rounded-0 text-2">Lihat Semua Galeri</a>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row pt-4 mt-5">
            <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter">
                <h2 class="font-weight-normal text-6">
                    <strong class="font-weight-extra-bold">Kegiatan</strong> Kami
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">
                        @foreach($activity as $activity)
                        <div class="col-md-4">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="{{ route('detail-kegiatan', $activity->slug) }}">
                                        <img src="{{ $activity->activity_gallery->count() ? Storage::url($activity->activity_gallery->first()->image) : '' }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ route('detail-kegiatan', $activity->slug) }}" style="color: black;">{{ $activity->title }}</a></h2>
                                    <p>{{ str_limit($activity->description, $limit = 100 ) }}</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By Admin </span>
                                        <span><i class="far fa-folder"></i>{{ $activity->activity_tag->tag }}</a></span>

                                        <span class="d-block mt-2"><a href="{{ route('detail-kegiatan', $activity->slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="row pb-5">
            <div class="col-lg-12 text-center">
                <a href="{{ route('activity') }}" class="btn btn-primary btn-px-5 btn-py-2 font-weight-bold text-color-light rounded-0 text-2">Lihat Semua Kegiatan</a>
            </div>
        </div>
    </div>
</div>
@endsection