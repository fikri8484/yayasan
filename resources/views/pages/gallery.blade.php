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
@endsection