@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
            <a href="{{ route('program.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Donasi
            </a>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive" width="100%" cellspacing="0" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th style="max-width: 10px;">No</th>
                                <th style="max-width: 70px;">Judul</th>
                                <th style="max-width: 50px;">Gambar</th>
                                <th style="max-width: 70px;">Kategori</th>
                                <th style="max-width: 70px;">Kalimat Ajakan</th>
                                <th style="max-width: 150px;">Deskripsi</th>
                                <th style="max-width: 50px;">Target Donasi(Rp)</th>
                                <th style="max-width: 50px;">Donasi Terkumpul(Rp)</th>
                                <th style="max-width: 70px;">Tgl Terakhir Donasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>





                        <tbody>
                            <?php
                            $i = 1;

                            ?>
                            @foreach($program as $p)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->title }}</td>
                                <td>
                                    <img src="{{ Storage::url($p->image) }}" alt="" style="width: 50px" class="img-thumbnail"></td>

                                <td>{{ $p->category->category_name }}</td>
                                <td>{{ $p->brief_explanation }}</td>
                                <td>{!!$p->description!!}</td>
                                <td>{{ $p->donation_target }}</td>
                                <td>{{ $p->donation_collected }}</td>
                                <td>{{ $p->time_is_up }}</td>
                                <td>
                                    <a href="{{ route('program.show', $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a><br><br>
                                    <a href="{{ route('program.edit', $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a><br><br>
                                    <form action="{{ route('program.destroy', $p->id) }}" method="POST" class="d-inline">
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

@push('addon-script')


@endpush