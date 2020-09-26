@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Status Donasi {{ $item->program->title }}</h1>
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
            <form action="{{ route('donatur.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Status</label>
                    <select name="donation_status" required class="form-control">
                        <option value="{{ $item->donation_status }}">Jangan Ubah ({{ $item->donation_status }})</option>
                        <option value="SUKSES">Sukses</option>
                        <option value="BELUM_TRANSFER">Belum Transfer</option>
                        <option value="BELUM_KONFIRM">Belum Konfirm</option>
                        <option value="SUDAH_KONFIRM">Sudah Konfirm</option>
                        <option value="DITOLAK">Ditolak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection