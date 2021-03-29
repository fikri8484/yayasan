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
                                <th style="max-width: 30px;">Judul</th>
                                <th style="max-width: 50px;">Gambar</th>
                                <th style="max-width: 50px;">Kalimat Ajakan</th>
                                <th style="max-width: 50px;">Target Donasi</th>
                                <th style="max-width: 50px;">Donasi Terkumpul</th>
                                <th style="max-width: 50px;">Tgl Penutupan Donasi</th>
                                <th style="max-width: 30px;">Program TerPublish?</th>
                                <th style="min-width: 100px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;

                            ?>
                            @foreach($program as $p)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->title }}
                                    @if($p->donation_target <= $p->donation_collected)
                                        <div class="badge badge-success" style="font-size: small">Terdanai <i class="fa fa-check"></i></div>
                                        @endif


                                </td>
                                <td>
                                    <img src=" {{ Storage::url($p->image) }}" alt="" style="width: 50px" class="img-thumbnail">
                                </td>
                                <td>{{ str_limit($p->brief_explanation, $limit = 20 ) }}</td>



                                <td>@currency($p->donation_target)</td>
                                <td>@currency($p->donation_collected)</td>
                                <td>{{ \Carbon\Carbon::parse($p->time_is_up)->format('d, M-Y') }}</td>
                                <td> @if ($p->is_published == 1)
                                    <div class="badge badge-success" style="font-size: small">Terpublish <i class="fa fa-check"></i></div>
                                    @else
                                    <div class="badge badge-danger" style="font-size: small">Tdk Terpublish <i class="fa fa-window-close"></i></div>
                                    @endif</td>
                                <td>
                                    <a href="{{ route('print', $p->id) }}" target="blank" class="btn btn-info">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a href="{{ route('program.show', $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('program.edit', $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('program.destroy', $p->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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