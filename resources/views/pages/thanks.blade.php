@extends('layouts.donation')

@section('title', 'TerimaKasih - Sedekah Jariah')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-white page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center"></div>

                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li> <a href="/">
                                <img alt="SedekahJariah" width="100" height="50" data-sticky-width="82" data-sticky-height="40" src="{{ url('img/logo11.png') }}" />
                            </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p style="text-align: center">
                            <i>Donasi Anda Sedang Kami Proses.....</i>
                        </p>
                        <p style="text-align: center;">
                            “Dan barang apa saja yang kamu nafkahkan, maka Allah akan menggantinya dan Dia-lah Pemberi rezki yang sebaik-baiknya.” (QS. Saba’: 39).

                        </p>
                        <h4 style="text-align: center">
                            Syukron Jazaakumullahu Khayran (Semoga Allah Membalas
                            Kebaikan yang Banyak Untuk Kalian Semua)
                        </h4>
                        <a href="/donasi" class="btn btn-primary btn-block">
                            <h4 style="color: antiquewhite" class="mt-2">
                                Lihat Program Lainnya
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br /><br /><br /><br />
@endsection