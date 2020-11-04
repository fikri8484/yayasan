@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mt-2">
            <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
            <a href="{{ route('gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Gallery
            </a>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            .
            <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-cog fa-sm text-white-50"></i> Kategori Galery
            </a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;

                            ?>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->gallery_category->category }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" onclick="return confirm('Yakin ingin menghapus?');">
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

                    {!! $items->links() !!}
                </div>
            </div>
        </div>


    </div> <!-- container -->

</div> <!-- content -->

@endsection

@push('addon-script')


@endpush