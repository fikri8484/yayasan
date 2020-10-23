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
    <p>Silahkan Kunjungi <a href="https://www.w3schools.com/TagS/ref_urlencode.asp" target="_blank">Link ini</a> untuk mengubah kalimat pesan menjadi encodeURIComponent() {pilih bagian <strong>URL Encoding Functions}</strong></p>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="number">Nomor Hp (cth: 6281345025918)</label>
                    <input type="number" class="form-control" name="number" placeholder="cth : 6281345025913" class="form-control" value="{{ old('number') }}">
                </div>

                <div class="form-group">
                    <label for="message">Isi Pesan (diubah dulu ya)</label>
                    <input type="text" class="form-control" name="message" placeholder="isi Pesan" class="form-control" value="{{ old('message') }}">
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