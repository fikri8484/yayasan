@extends('layouts.donation')

@section('title', 'TerimaKasih - SedekahJariah')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-secondary page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-light text-uppercase">

                        <strong>Konfirmasi Donasi {{ $program->title }}</strong>
                    </h1>
                </div>

                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">Home</a></li>
                        <li style="color: white">Donation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- <p style="text-align: center">
                    <i class="icon-clock icons"></i> Selesaikan pembayaran donasi
                    sebelum <b>besok</b> jam <b>{{$tomorrow}}</b>
                </p> --}}
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center">Total Pembayaran Donasi</h4>
                        <h2 style="text-align: center; color: #26456e">
                            <strong> @currency($donatur->nominal_donation)</strong>
                        </h2>
                        <div class="alert alert-info" style="text-align: center">
                            <strong>Penting</strong>
                            Mohon transfer tepat sampai 3 angka terakhir agar donasi
                            Anda dapat diproses oleh Admin. Jika nominal donasi tidak sesuai, silahkan Hubungi Admin via WhatsApp
                        </div>
                        <div style="text-align: center">

                            <p>Silahkan Transfer ke :</p>
                            <h4> {{ $donatur->shelter_account->bank }} : {{ $donatur->shelter_account->account_number }}</h4>
                            <p><b>{{ $donatur->shelter_account->on_name }}</b></p>

                        </div>
                        <p>Rincian :</p>
                        <!-- <div class="d-sm-flex align-items-center justify-content-center bg-color-primary px-2">
                            <h4 class="mt-2" style="color: antiquewhite">
                                Jumlah Donasi
                            </h4>
                            <h4 class="mt-2" style="color: antiquewhite">@currency($donatur->nominal_input)</h4>
                        </div> -->
                        <h4 class="bg-color-primary my-2 btn-outline text-color-light justify-content-between" style="text-align: center;">Jumlah Donasi : @currency($donatur->nominal_input)
                        </h4>
                        <h4 class="bg-color-light-scale-1 my-2 btn-outline justify-content-between" style="text-align: center;">Kode Unik* : {{ $donatur->id_transaction }}
                        </h4>
                        <!-- 
                        <div class="d-sm-flex align-items-center justify-content-between bg-color-light-scale-1 px-2">
                            <h4>Kode Unik*</h4>
                            <h4>{{ $donatur->id_transaction }}</h4>
                        </div> -->
                        <p><i> *Kode unik akan didonasikan</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Bukti Transfer Harus Dikirim dgn format jpeg/png/jpg/gif/svg max: 2mb
                        </div>
                        @endif
                        <form action="/confirmdonation/store/{{$donatur->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="proof_payment">
                                    <h4>Silahkan Kirim Foto Bukti Transfer</h4>
                                </label>
                                <input type="hidden" name="donation_status" value="SUDAH_KONFIRM">
                                <input type="hidden" name="programs_id" value="{{$program->id}}">
                                <input type="file" name="proof_payment" id="proof_payment" placeholder="proof_payment" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                Kirim Foto
                            </button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="text-align: center">
                                Syukron Jazaakumullahu Khayran (Semoga Allah Membalas
                                Kebaikan yang Banyak bagi Kalian Semua)
                            </h4>
                            <a href="/donasi" class="btn btn-secondary btn-block">
                                <h4 style="color: antiquewhite" class="mt-2">
                                    Lihat Program Lainnya
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    @endsection