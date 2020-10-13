@extends('layouts.donation')

@section('title', 'Form-Donasi')

@section('content')

<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-secondary page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-light text-uppercase">
                        <strong>Form Donasi untuk {{$program->title}}</strong>
                    </h1>
                </div>

                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">Home</a></li>
                        <li style="color: white">Form-Donasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <section class="card card-admin form-wizard" id="w4">
                    <!-- <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Form Wizard</h2>
                    </header> -->
                    <div class="card-body">
                        <!-- <div class="wizard-progress wizard-progress-lg">
                            <div class="steps-progress">
                                <div class="progress-indicator"></div>
                            </div>
                            <ul class="nav wizard-steps">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#w4-account" data-toggle="tab"><span>1</span>Account Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#w4-profile" data-toggle="tab"><span>2</span>Profile Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#w4-billing" data-toggle="tab"><span>3</span>Billing Info</a>
                                </li>
                            </ul>
                        </div> -->
                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Silahkan isi Nama, Nominal Donasi, dan Tujuan Transfer Bank
                        </div>
                        @endif
                        <form class="form-horizontal p-3" novalidate="novalidate" action="/donasi/{{$program->slug}}/form/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div id="w4-account" class="tab-pane active">
                                    <div class="form-group">
                                        <label for="nominal_donation">Nominal Donasi</label>

                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Rp
                                                </span>
                                            </span>
                                            <input type="number" class="form-control" name="nominal_donation" placeholder="Donasi" value="{{ old('nominal_donation') }}" required autocomplete="off" required>
                                        </div>

                                    </div>
                                    <input type="hidden" name="programs_id" value="{{$program->id}}">


                                    <div class="wizard-progress wizard-progress-lg">
                                        <ul class="nav wizard-steps">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#w4-profile" data-toggle="tab" style="text-align: right;"><span></span>Selanjutnya</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="w4-profile" class="tab-pane">
                                    <div class="form-group">
                                        <label for="shelter_accounts_id">Transfer Bank </label>
                                        <select name="shelter_accounts_id" required class="form-control">
                                            <option value="">Pilih Bank Tujuan Transfer</option>
                                            @foreach ($bank as $bank)
                                            <option value="{{ $bank->id }}">
                                                {{ $bank->bank }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="wizard-progress wizard-progress-lg">
                                        <div class="steps-progress">
                                            <div class="progress-indicator"></div>
                                        </div>
                                        <ul class="nav wizard-steps">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#w4-billing" data-toggle="tab"><span></span>Selanjutnya</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="w4-billing" class="tab-pane">
                                    @if (Auth::check())
                                    <p>Silahkan lengkapi Data Dibawah Ini</p>
                                    <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" readonly name="donor_name" value="{{Auth::user()->name}}">

                                        <div class="form-check">
                                            <input id="check" type="checkbox" name="donor_name" class="form-check-input" value="Hamba Allah">
                                            <label for="check" class="form-check-label">Sembunyikan Nama Saya (Hamba Allah)</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" readonly name="email" value="{{Auth::user()->email}}">
                                    </div>
                                    @else

                                    Silahkan <a href="/login"><b>Login</b></a> atau
                                    Lengkapi Data di Bawah Ini
                                    </h4>
                                    </header>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="donor_name">Nama</label>
                                            <input type="text" class="form-control" name="donor_name" placeholder="Nama" value="{{ old('donor_name') }}">
                                            <div class="form-check">
                                                <input id="check" type="checkbox" name="donor_name" class="form-check-input" value="Hamba Allah">
                                                <label for="check" class="form-check-label">Sembunyikan Nama Saya (Hamba Allah)</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email <i>(Optional/Boleh kosong)</i></label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="support">Dukungan / Doa <i>(Optional/Boleh kosong)</i></label>
                                            <input type="textarea" class="form-control" name="support" placeholder="Semoga Menjadi Amal Jariyah" value="{{ old('support') }}">
                                        </div>
                                        <input type="hidden" name="recaptcha_v3" id="recaptcha_v3">

                                        <button type="submit" class="btn btn-primary btn-block" style="height: 80px; font-size:large;">
                                            Lanjutkan Donasi
                                        </button>
                        </form>
                    </div>
                    <!-- <div class="card-footer">
                        <ul class="pager">
                            <li class="previous disabled">
                                <a><i class="fas fa-angle-left"></i> Previous</a>
                            </li>
                            <li class="finish hidden float-right">
                                <a>Finish</a>
                            </li>
                            <li class="next">
                                <a>Next <i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </div> -->
                </section>
            </div>
        </div>
    </div>

</div>
@endsection
@push('addon-script')
<script src="https://www.google.com/recaptcha/api.js?render={{env('G_RECAPTCHA_SITE_KEY')}}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{env('G_RECAPTCHA_SITE_KEY')}}", {
            action: 'donation'
        }).then(function(token) {
            if (token) {
                //js
                document.getElementById('recaptcha_v3').value = token;
                //if you use jquery library
                //$("#recaptcha_v3").val(token);
            }
        });
    });
</script>


<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>


<script type="text/javascript">
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@endpush