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
            <div class="col-md-8">
                <section class="card card-admin">

                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>
                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/donasi/{{$program->slug}}/form/store" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
                            @csrf
                            @if (Auth::check())
                            <h4 class="card-title">
                                Silahkan lengkapi Data Dibawah Ini
                            </h4>
                    </header>
                    <div class="card-body">

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
                        <h4 class="card-title">
                            Silahkan <a href="/login"><b>Login</b></a> atau
                            Lengkapi Data di Bawah Ini
                        </h4>
                        </header>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="donor_name">Nama</label>
                                <input type="text" class="form-control" name="donor_name" placeholder="Nama" value="{{ old('donor_name') }}" required autocomplete="off">
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
                            <input type="hidden" name="programs_id" value="{{$program->id}}">

                            <div class="form-group">
                                <label for="nominal_donation">Nominal Donasi</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                    </span>

                                    <input type="text" class="form-control" name="nominal_donation" value="{{ old('nominal_donation') }}" required autocomplete="off" id="rupiah">
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="shelter_accounts_id">Transfer Bank </label>

                                <select name="shelter_accounts_id" required class="form-control" onclick="GFG_Fun();">
                                    <option value="">Pilih Bank Tujuan Transfer</option>
                                    @foreach ($bank as $bank)
                                    <option value="{{ $bank->id }}">
                                        {{ $bank->bank }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="support">Dukungan / Doa <i>(Optional/Boleh kosong)</i></label>
                                <input type="textarea" class="form-control" name="support" placeholder="Semoga Menjadi Amal Jariyah" value="{{ old('support') }}">
                            </div>
                            <input type="hidden" name="recaptcha_v3" id="recaptcha_v3">



                            @if ($program->donation_collected >= $program->donation_target)
                            <span class="btn mb-4" style="width: 100%; height: 100%; background-color:#7f8c8d;">

                                <h4 style="color: whitesmoke" class="pt-2">
                                    ~ Donasi Ditutup ~
                                </h4>

                            </span>
                            @elseif ($program->is_published == 0)
                            <span class="btn mb-4" style="width: 100%; height: 100%; background-color:#7f8c8d;">

                                <h4 style="color: whitesmoke" class="pt-2">
                                    ~ Donasi Ditutup ~
                                </h4>

                            </span>

                            @else
                            <button type="submit" value="Submit" class="btn btn-primary btn-block" style="height: 80px; font-size:large;">
                                Lanjutkan Donasi
                            </button>
                            @endif
                            </form>
                        </div>
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
    var inputs, index;
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, '');
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
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>

<!-- <script>
    function validateForm() {
        var x = document.forms["myForm"]["nominal_donation"].value;
        if (x < 10, 000) {
            alert("minimal 10.000");
            return false;
        }
    }
</script> -->

@endpush