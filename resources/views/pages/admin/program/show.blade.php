@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Donasi {{ $item->title }}</h1>
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
                    <th>Foto</th>
                    <td>
                        <img src="{{ Storage::url($item->image) }}" alt="" style="width: 250px" class="img-thumbnail"></td>
                </tr>
                <tr>
                    <th>Kalimat Ajakan</th>
                    <td>{{ $item->brief_explanation }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $item->category->category_name }}</td>
                </tr>
                <tr>
                    <th>Target Donasi</th>
                    <td>@currency($item->donation_target)</td>
                </tr>
                <tr>
                    <th>Donasi Terkumpul</th>
                    <td>@currency($item->donation_collected)</td>
                </tr>

                <tr>
                    <th>Tanggal Penutupan Donasi</th>
                    <td>@if ($item->time_is_up == '2015-01-01')
                        <div class="badge badge-warning" style="font-size: small">Program Terus Digalang</div>
                    @else
                    {{ \Carbon\Carbon::parse($item->time_is_up)->format('d, M-Y') }}
                    @endif</td>
                </tr>
                <tr>
                    <th>Program Donasi Pilihan?</th>
                    <td> @if ($item->is_selected == 1)
                        <b>Ya</b>
                        @else
                        <b>Tidak</b>
                        @endif</td>
                </tr>
                <tr>
                    <th>Program Donasi TerPublish?</th>
                    <td> @if ($item->is_published == 1)
                        <b>Ya</b>
                        @else
                        <b>Tidak</b>
                        @endif</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{!! $item->description !!}</td>
                </tr>


                <tr>
                    <?php
                    $a = 1; ?>
                    <th>Berita</th>
                    <td>@foreach($item->developments as $d)
                        <b>Berita {{ $a++}} :</b> {{ $d->title }} <br>
                        <b>Waktu :</b> {{ $d->time }} <br>
                        <b>Deskripsi :</b> {!! $d->description !!} <br>
                        <b> --------------------------------------------------------------------------------------------------- </b><br>
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')

@endpush