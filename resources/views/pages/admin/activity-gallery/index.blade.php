@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1>
            <a href="{{ route('activity.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kegiatan
            </a>
        </div>


        <div class="row">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tag</th>
                                <th>Gambar</th>
                                <th>Dibuat Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->activity->id }}</td>
                                <td>{{ $item->activity->title }}</td>
                                <td>{{ $item->activity->description}}</td>
                                <td>{{ $item->activity_tag->tag }}</td>
                                <td><img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail"></td>
                                <td>{{ $item->activity->time }}</td>
                                <td>
                                    <a href="{{ route('activity-gallery.index', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('activity.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('activity.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div> <!-- container -->

</div> <!-- content -->

@endsection