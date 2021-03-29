@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Data Donatur Barang</h1>
            <a href="{{ route('donaturobject.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
            </a>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive" width="100%" cellspacing="0" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Program Donasi</th>
                                <th>Donatur</th>
                                <th>Tgl Donasi</th>
                                <th>Barang Donasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @forelse($items as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                @if($item->program == null)
                                <td>(Nama Program Sudah Dihapus)</td>
                                @else
                                <td>{{ $item->program->title }}</td>
                                @endif
                                <td>{{ $item->donor_name }}</td>
                                <td>{{ $item->created_at->add('1 day')->format('H:i\ , d M Y') }}</td>
                                <td>{{ $item->object }}</td>
                                <td>
                                    <a href="{{ route('donaturobject.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('donaturobject.destroy', $item->id) }}" method="post" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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