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
                        <li class="active" style="color: #f26506">Galeri</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-2">
        <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
            <li class="nav-item active" data-option-value="*">
                <a class="nav-link text-1 text-uppercase active" href="#">Show All</a>
            </li>
            <li class="nav-item" data-option-value=".websites">
                <a class="nav-link text-1 text-uppercase" href="#">Websites</a>
            </li>
            <li class="nav-item" data-option-value=".logos">
                <a class="nav-link text-1 text-uppercase" href="#">Logos</a>
            </li>
            <li class="nav-item" data-option-value=".brands">
                <a class="nav-link text-1 text-uppercase" href="#">Brands</a>
            </li>
            <li class="nav-item" data-option-value=".medias">
                <a class="nav-link text-1 text-uppercase" href="#">Medias</a>
            </li>
        </ul>

        <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
            <div class="row portfolio-list sort-destination lightbox" data-sort-id="portfolio" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                <div class="col-md-6 col-lg-3 isotope-item brands">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/masjid.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Perluasan Tanah Belakang Pesantern</span>
                                    <span class="thumb-info-type">Brand</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/masjid.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item medias">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/masjid2.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto Watch</span>
                                    <span class="thumb-info-type">Media</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/masjid2.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item logos">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/masjid.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Identity</span>
                                    <span class="thumb-info-type">Logo</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/masjid.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item websites">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/masjid2.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto Screens</span>
                                    <span class="thumb-info-type">Website</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/masjid2.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item logos">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-4.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Three Bottles</span>
                                    <span class="thumb-info-type">Logo</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-4.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item brands">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-5.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Company T-Shirt</span>
                                    <span class="thumb-info-type">Brand</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-5.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item websites">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-6.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Mobile Mockup</span>
                                    <span class="thumb-info-type">Website</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-6.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item medias">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-7.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto Label</span>
                                    <span class="thumb-info-type">Media</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-7.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item logos">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-23.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Business Folders</span>
                                    <span class="thumb-info-type">Logo</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-23.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item websites">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-24.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Tablet Screen</span>
                                    <span class="thumb-info-type">Website</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-24.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item medias">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-25.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Black Watch</span>
                                    <span class="thumb-info-type">Media</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-25.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 isotope-item websites">
                    <div class="portfolio-item">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="img/projects/project-26.jpg" class="img-fluid border-radius-0" alt="" />
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Monitor Mockup</span>
                                    <span class="thumb-info-type">Website</span>
                                </span>
                                <span class="thumb-info-action">
                                    <a href="img/projects/project-26.jpg" class="lightbox-portfolio">
                                        <span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
                                    </a>
                                </span>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection