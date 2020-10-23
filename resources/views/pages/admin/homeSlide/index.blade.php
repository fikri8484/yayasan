@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Home Slide</h1>
            <a href="{{ route('homeSlide.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Slide
            </a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi Singkat</th>
                                <th>Gambar</th>
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
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail">
                                </td>
                                <td>
                                    <a href="{{ route('homeSlide.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('homeSlide.destroy', $item->id) }}" method="POST" onclick="return confirm('Yakin ingin menghapus?');">
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

@push('addon-script')


@endpush