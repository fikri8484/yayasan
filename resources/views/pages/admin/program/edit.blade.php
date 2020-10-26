@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Program Donasi {{ $item->title }}</h1>
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
            <form action="{{ route('program.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="categoriess_id">Kategori</label>
                    <select name="categories_id" required class="form-control">
                        <option value="{{ $item->categories_id }}">Silahkan Pilih Jika Ingin Mengganti</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="Image" value="{{ Storage::url($item->image) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="brief_explanation">Kalimat Ajakan</label>
                    <input type="text" class="form-control" name="brief_explanation" placeholder="Ajakan" value="{{ $item->brief_explanation }}">
                </div>

                <div class="form-group">
                    <label for="donation_target">Target Donasi (Rp)</label>
                    <input type="number" class="form-control" name="donation_target" placeholder="Target Donasi" value="{{ $item->donation_target }}">
                </div>

                <div class="form-group">
                    <label for="time_is_up">Tanggal Tutup Donasi</label>
                    <input type="date" class="form-control" name="time_is_up" placeholder="Tanggal" value="{{ $item->time_is_up }}">
                </div>
                <div class="form-group">
                    <label for="is_selected">Program Donasi Pilihan?</label>
                    <select name="is_selected" required class="form-control">
                        <option value="{{ $item->is_selected }}">@if($item->is_selected == 1) YA @else TIDAK @endif</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="is_published">Tampilkan Program Donasi ini di Publik?</label>
                    <select name="is_published" required class="form-control">
                        <option value="{{ $item->is_published }}">@if($item->is_published == 1) YA @else TIDAK @endif</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" rows="10">{{ $item->description }}</textarea>
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

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endpush