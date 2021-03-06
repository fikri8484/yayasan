@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mt-2">
            <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1>
            <a href="{{ route('activity.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kegiatan
            </a>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            .
            <a href="{{ route('activity-tag.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-cog fa-sm text-white-50"></i> Kategori Kegiatan
            </a>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="max-width: 10px;">No</th>
                                <th style="max-width: 70px;">Judul</th>
                                <th style="max-width: 250px;">Deskripsi</th>
                                <th>Kategori</th>
                                <th style="max-width: 70px;">tgl Pembuatan</th>
                                <th>Foto</th>
                                <th style="max-width: 150px;">Aksi</th>
                            </tr>
                        </thead>




                        <tbody>
                            <?php $i = 1;
                            ?>
                            @foreach($activity as $a)



                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $a->title }}</td>
                                <td>{!! str_limit($a->description, $limit = 150) !!}</td>
                                <td>{{ $a->activity_tag->tag }}</td>
                                <td>{{ \Carbon\Carbon::parse($a->time)->format('d, M-y') }}</td>
                                <td>@foreach($a->activity_gallery as $g)
                                    <img src="{{ Storage::url($g->image) }}" alt="" style="width: 50px" class="img-thumbnail"> <br>@endforeach</td>
                                <td>
                                    <a href="{{ route('activity.show', $a->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('activity.edit', $a->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('activity.destroy', $a->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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