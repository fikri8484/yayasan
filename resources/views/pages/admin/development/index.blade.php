@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Berita Donasi</h1>
            <a href="{{ route('development.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Berita Donasi
            </a>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="max-width: 10px;">No</th>
                                <th style="max-width: 70px;">Nama Program Donasi</th>
                                <th>Judul Perkembangan</th>

                                <th style="max-width: 250px;">Deskripsi</th>

                                <th style="max-width: 70px;">tgl Berita</th>

                                <th style="max-width: 150px;">Aksi</th>
                            </tr>
                        </thead>




                        <tbody>
                            <?php $i = 1;
                            ?>
                            @foreach($development as $d)



                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $d->program->title }}</td>
                                <td>{{ $d->title }}</td>

                                <td>{{ str_limit($d->description, $limit = 100 ) }}</td>

                                <td>{{ $d->time }}</td>
                                <td>

                                    <a href="{{ route('development.edit', $d->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('development.destroy', $d->id) }}" method="POST" class="d-inline">
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