@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Kategori Gallery</h1>
            .
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Gallery</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            ?>
                            @foreach($items as $items)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $items->category }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $items->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('category.destroy', $items->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus? jika hapus di Kategori ini maka Galeri yg memiliki kategori ini juga akan terhapus');">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- container -->
</div> <!-- content -->

@endsection