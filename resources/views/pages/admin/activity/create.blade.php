@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kegiatan</h1>
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
            <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="activity_tags_id">Kategori |</label>
                    <a href="{{ route('activity-tag.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori
                    </a>
                    <select name="activity_tags_id" required class="form-control">
                        <option value="">Pilih Kategori</option>
                        @foreach ($activity_tags as $activity_tag)
                        <option value="{{ $activity_tag->id }}">
                            {{ $activity_tag->tag }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="time">Tanggal Berlangsung Kegiatan</label>
                    <input type="date" class="form-control" name="time" placeholder="time" value="{{ old('time') }}">
                </div>

                <div class="form-group">
                    <label for="image">Image (Bisa lebih dari 1 foto)</label>
                    <input type="file" class="form-control" name="images[]" placeholder="Image" multiple class="form-control">
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