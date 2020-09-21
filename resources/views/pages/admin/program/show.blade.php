@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Donasi</h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{ $item->title }}</td>
                </tr>
                <tr>
                    <th>Kalimat Ajakan</th>
                    <td>{{ $item->brief_explanation }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{!! $item->description !!}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $item->category->category_name }}</td>
                </tr>
                <tr>
                    <th>Target Donasi</th>
                    <td>{{ $item->donation_target }}</td>
                </tr>
                <tr>
                    <th>Donasi Terkumpul</th>
                    <td>{{ $item->donation_collected }}</td>
                </tr>

                <tr>
                    <th>Waktu Akhir Donasi</th>
                    <td>{{ $item->time_is_up }}</td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>
                        <img src="{{ Storage::url($item->image) }}" alt="" style="width: 250px" class="img-thumbnail"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')

@endpush