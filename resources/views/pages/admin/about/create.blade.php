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
            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="title" value="{{ old('title') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" rows="10" class="d-block w-100 form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" name="address" placeholder="alamat" value="{{ old('address') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="whatsapp">Nomor Whatsapp Admin</label>
                    <input type="text" class="form-control" name="whatsapp" placeholder="nomor WA" value="{{ old('whatsapp') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fb">Link Fanspage Facebook (jika Ada)</label>
                    <input type="text" class="form-control" name="fb" placeholder="link FB" value="{{ old('fb') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image1">Foto 1 (Utama)</label>
                    <input type="file" class="form-control" name="image1" placeholder="Image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image2">Foto 2</label>
                    <input type="file" class="form-control" name="image2" placeholder="Image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image3">Foto 3</label>
                    <input type="file" class="form-control" name="image3" placeholder="Image" class="form-control">
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