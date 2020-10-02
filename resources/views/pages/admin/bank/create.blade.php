@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Akun Bank</h1>
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
            <form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="bank">Nama Bank</label>
                    <input type="text" class="form-control" name="bank" placeholder="BNI/Mandiri Syariah/...." value="{{ old('bank') }}">
                </div>
                <div class="form-group">
                    <label for="account_number">Nomor Rekening Bank</label>
                    <input type="text" class="form-control" name="account_number" placeholder="123-123-123-123" value="{{ old('account_number') }}">
                </div>
                <div class="form-group">
                    <label for="on_name">Atas Nama</label>
                    <input type="text" class="form-control" name="on_name" placeholder="cth: A.N Yayasan Abdurrahman bin Auf" value="{{ old('on_name') }}">
                </div>


                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection