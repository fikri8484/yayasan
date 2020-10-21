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
            <div class="col-md-12 order-2 order-md-1 align-self-center p-static">
                <h1 style="color: black; text-align:center;">Donasi <strong>Pilihan</strong></h1>
            </div>
        </div>


        <div class="tanyaAdmin">
            <a href="https://api.whatsapp.com/send?phone=6281522862759&text=Assalamu%27alaikum%20admin%20...%20%20%20%0A%0A%0ASumber%20info%3A%20http%3A%2F%2Fdev.sedekahjariyah.idekite.id%2F
" target="_blank"><button type="button" class="btn btn-primary btn-xl mb-2"><i class="fab fa-whatsapp"></i> |Tanya Admin</button></a>

        </div>


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
                            $c = 100;
                            $bar = $a * $c / $b;
                            ?>

                            <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="{{$bar}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$bar}}%">

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

        <div class="row">
            <div class="col">
                <hr class="bg-color-grey size=" 50" style="height: 4px" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 order-2 order-md-1 align-self-center p-static pt-3">
                <h4 style="color: black;"><b>Donasi </b>Lainnya</h4>
            </div>
        </div>

        <div class="row">
            @foreach($programsNew as $newProgram)
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <a href="{{ route('detail-donation', $newProgram->slug) }}">
                        <img class="card-img-top" src="{{ Storage::url($newProgram->image) }}" alt="Card Image"> </a>
                    <div class="card-body">
                        @if ($newProgram->donation_collected >= $newProgram->donation_target)
                        <div class="badge badge-success">Terdanai <i class="fa fa-check"></i></div>
                        @endif
                        <a href="{{ route('detail-donation', $newProgram->slug) }}" class="text-decoration-none">
                            <h4>{{ str_limit($newProgram->brief_explanation, $limit = 62 ) }}</h4>
                        </a> <a><i class="icon-check icons"></i><span class="name"> {{ $newProgram->category->category_name }}</span></a>
                        <div class="progress progress-xs">

                            <?php
                            $d = $newProgram->donation_collected;
                            $e = $newProgram->donation_target;
                            $f = 100;
                            $barr = $d * $f / $e;
                            ?>
                            <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="{{$barr}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$barr}}%">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p style="text-align: center;"> <strong class="text-color-primary">
                                    <?php
                                    $akhir1 = \Carbon\Carbon::parse($newProgram->time_is_up)->format('Y-m-d');
                                    $start_date = \Carbon\Carbon::now('Asia/Jakarta');
                                    $end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $akhir1);
                                    $different_days1 = $start_date->diffInDays($end_date);
                                    ?>

                                    @if ($different_days1 == 0) Kurang dari 1 @else {{$different_days1}} @endif </strong> Hari lagi / Terkumpul <strong class="text-color-primary" style="text-align: right;"> @if ($newProgram->donation_collected == 0)
                                    Rp. 0
                                    @else
                                    @currency($newProgram->donation_collected)
                                    @endif</strong> </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {!! $programsNew->links() !!}
    </div>
</div>

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