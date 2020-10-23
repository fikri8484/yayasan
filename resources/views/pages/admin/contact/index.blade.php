@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Contact Person WhatsApp (hanya 1 data saja)</h1>
            <a href="{{ route('contact.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
            </a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Hp</th>
                                <th>Isi Pesan</th>
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
                                <td>{{ $item->number }}</td>
                                <td>{{ str_limit($item->message, $limit = 70 ) }}</td>
                                <td>
                                    <a href="{{ route('contact.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('contact.destroy', $item->id) }}" method="POST" onclick="return confirm('Yakin ingin menghapus?');">
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