@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Status Donasi Barang {{ $item->program->title }}</h1>
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
            <form action="{{ route('donaturobject.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="programs_id">Program Donasi</label>
                    <select name="programs_id" required class="form-control">
                        <option value="{{ $item->programs_id }}">{{ $item->program->title }}</option>
                        @foreach ($program as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="donor_name">Nama</label>
                    <input type="text" class="form-control" name="donor_name" placeholder="Nama" value="{{ $item->donor_name }}">
                </div>
                <div class="form-group">
                    <label for="phone">No. Handphone</label>
                    <input type="number" class="form-control" name="phone" placeholder="No. Handphone" value="0{{ $item->phone }}">
                </div>

                <div class="form-group">
                    <label for="object">Donasi Barang Berupa</label>
                    <input type="text" class="form-control" name="object" placeholder="semen 1 sak, pasir 1 dam, dll" value="{{ $item->object }}">
                </div>

                <div class="form-group">
                    <label for="support">Dukungan / Doa <i>(Optional/Boleh kosong)</i></label>
                    <input type="text" class="form-control" name="support" placeholder="Semoga menjadi Amal jariyah" value="{{ $item->support }}">
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