@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Slide</h1>
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
            <form action="{{ route('homeSlide.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Judul (max: 25 karakter)</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Singkat (max: 25 karakter)</label>
                    <input type="text" class="form-control" name="description" placeholder="Deskripsi Singkat" value="{{ $item->description }}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    @if($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail">
                    @endif
                    <input type="file" class="form-control" name="image" placeholder="Image" value="{{$item->image}}">
                </div>
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection