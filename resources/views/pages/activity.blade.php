@extends('layouts.app')

@section('title', 'Kegiatan')

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
                                    <p>{{ str_limit($a->description, $limit = 100 ) }}</p>

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
                    {!! $activity->links() !!}


                </div>
                @foreach ($about as $about)

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection