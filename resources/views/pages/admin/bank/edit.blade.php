@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun Bank</h1>
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
            <form action="{{ route('bank.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="bank">Nama Bank</label>
                    <input type="text" class="form-control" name="bank" placeholder="BNI/Mandiri Syariah/...." value="{{ $item->bank }}">
                </div>
                <div class="form-group">
                    <label for="account_number">Nomor Rekening Bank</label>
                    <input type="text" class="form-control" name="account_number" placeholder="123-123-123-123" value="{{ $item->account_number }}">
                </div>
                <div class="form-group">
                    <label for="on_name">Atas Nama</label>
                    <input type="text" class="form-control" name="on_name" placeholder="cth: A.N Yayasan Abdurrahman bin Auf" value="{{ $item->on_name }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection