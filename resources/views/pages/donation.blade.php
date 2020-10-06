@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern page-header-sm bg-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 style="color: black"><strong>Donasi</strong></h1>
                    <!-- <p>Cari Data Pegawai :</p>
                    <form action="/donasi/cari" method="GET">
                        <input type="text" name="cari" placeholder="Cari Donasi .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                    </form> -->
                </div>

                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-right">
                        <li><a href="#">Home</a></li>
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

        <div class="row">
            <div class="col">
                <hr class="bg-color-grey size=" 50" style="height: 4px" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 order-2 order-md-1 align-self-center p-static pt-3">
                <h1 style="color: black; text-align:center;"><b>Donasi </b>Lainnya</h1>
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
                            $f = 10;
                            $barr = $d . $f / $e;
                            ?>
                            <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{$barr}}%">
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