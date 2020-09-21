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
                    <label for="activity_tags_id">Tag | </label>
                    <a href="{{ route('activity-tag.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Tag
                    </a>
                    <select name="activity_tags_id" required class="form-control">
                        <option value="">Pilih Tag</option>
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
                    <label for="description">About</label>
                    <textarea name="description" rows="10" class="d-block w-100 form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="time">Tanggal Buat</label>
                    <input type="date" class="form-control" name="time" placeholder="time" value="{{ old('time') }}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="images[]" placeholder="Image" multiple class="form-control">
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