@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
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
            <form action="{{ route('about.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" name="address" placeholder="Alamat" value="{{ $item->address }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $item->email }}">
                </div>

                <div class="form-group">
                    <label for="whatsapp">Nomor Whatsapp Admin</label>
                    <input type="text" class="form-control" name="whatsapp" placeholder="Nomor Whatsapp" value="{{ $item->whatsapp }}">
                </div>
                <div class="form-group">
                    <label for="fb">Link Fanspage Facebook (jika Ada)</label>
                    <input type="text" class="form-control" name="fb" placeholder="Link FB" value="{{ $item->fb }}">
                </div>

                <div class="form-group">
                    <label for="image1">Foto 1 (Utama)</label>
                    <input type="file" class="form-control" name="image1" placeholder="Image1" value="{{ Storage::url($item->image1) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image2">Foto 2</label>
                    <input type="file" class="form-control" name="image2" placeholder="Image2" value="{{ Storage::url($item->image2) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image3">Foto 3</label>
                    <input type="file" class="form-control" name="image3" placeholder="Image3" value="{{ Storage::url($item->image3) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" rows="10">{{ $item->description }}</textarea>
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
@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endpush