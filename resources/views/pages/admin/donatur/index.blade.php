@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Donasi</h1>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive" width="100%" cellspacing="0" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Donasi</th>
                                <th>Donatur</th>
                                <th>Tgl Limit Donasi</th>
                                <th>Nominal Donasi</th>
                                <th>Bank</th>
                                <th>Status</th>
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
                                <td>{{ $item->program->title }}</td>
                                <td>{{ $item->donor_name }}</td>
                                <td>{{ $item->created_at->add('1 day')->format('H:i\ , d M Y') }}</td>

                                <td>@currency($item->nominal_donation)</td>
                                <td>{{ $item->shelter_account->bank }} <br> ({{ $item->shelter_account->account_number }})</td>
                                <td>{{ $item->donation_status }}</td>
                                <td>
                                    <a href="{{ route('donatur.show', $item->id) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('donatur.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('donatur.destroy', $item->id) }}" method="post" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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