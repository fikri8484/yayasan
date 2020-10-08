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
                            <strong>Whoops!</strong> Silahkan isi Nama, Nominal Donasi, dan Tujuan Transfer Bank
                        </div>
                        @endif
                        <form action="/donasi/{{$program->slug}}/form/store" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" name="programs_id" value="{{$program->id}}">

                            <div class="form-group">
                                <label for="nominal_donation">Nominal Donasi (Rp) </label>
                                <input type="number" class="form-control" name="nominal_donation" placeholder="Donasi" value="{{ old('nominal_donation') }}">
                            </div>

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

                            <div class="form-group">
                                <label for="support">Dukungan / Doa <i>(Optional/Boleh kosong)</i></label>
                                <input type="textarea" class="form-control" name="support" placeholder="Semoga Menjadi Amal Jariyah" value="{{ old('support') }}">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" style="height: 80px; font-size:large;">
                                Lanjutkan Donasi
                            </button>

                            </form>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')

@endpush