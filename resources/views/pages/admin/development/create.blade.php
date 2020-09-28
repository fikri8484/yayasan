@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Berita Donasi</h1>
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
            <form action="{{ route('development.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="programs_id">Program Donasi </label>
                    <select name="programs_id" required class="form-control">
                        <option value="">Pilih Program Donasi</option>
                        @foreach ($development as $d)
                        <option value="{{ $d->id }}">
                            {{ $d->title }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="time">Tanggal Buat</label>
                    <input type="date" class="form-control" name="time" placeholder="time" value="{{ old('time') }}">
                </div>
                <div class="form-group">
                    <label for="description" class="label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
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

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endpush