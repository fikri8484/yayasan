@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
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
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="gallery_categories_id">Kategori</label>
                    <select name="gallery_categories_id" required class="form-control">
                        <option value="{{ $item->gallery_categories_id }}">Silahkan Pilih Jika Ingin Mengganti</option>
                        @foreach ($gallery_categories as $gallery_category)
                        <option value="{{ $gallery_category->id }}">
                            {{ $gallery_category->category }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>



                <div class="form-group">
                    <label for="image">Image</label>
                    @if($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail">
                    @endif
                    <input type="file" class="form-control" name="image" placeholder="Image" value="{{$item->image}}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection