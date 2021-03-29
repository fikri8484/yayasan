@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('donaturobject.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
                @csrf

                <div class="form-group">
                    <label for="programs_id">Program Donasi </label>
                    <select name="programs_id" required class="form-control">
                        <option value="">Pilih Program Donasi</option>
                        @foreach ($program as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->title }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="donor_name">Nama</label>
                    <input type="text" class="form-control" name="donor_name" placeholder="Nama" value="{{ old('donor_name') }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="phone">No. Handphone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Nomor Handphone Aktif Anda" value="{{ old('phone') }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="object">Donasi Barang Berupa</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="object" value="{{ old('object') }}" required autocomplete="off" placeholder="Semen, pasir, dll">
                    </div>

                </div>
                <div class="form-group">
                    <label for="support">Dukungan / Doa <i>(Optional/Boleh kosong)</i></label>
                    <input type="textarea" class="form-control" name="support" placeholder="Semoga Menjadi Amal Jariyah" value="{{ old('support') }}">
                </div>

                <br><br>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
