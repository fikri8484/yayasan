@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Donasi {{ $item->program->title }}</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Donasi</th>
                    <td>{{ $item->program->title }}</td>
                </tr>
                <tr>
                    <th>Donatur</th>
                    <td>{{ $item->donor_name }}</td>
                </tr>
                <tr>
                    <th>Nominal Donasi</th>
                    <td>@currency($item->nominal_donation)</td>
                </tr>
                <tr>
                    <th>Waktu Pembuatan form donasi</th>
                    <td>{{ $item->created_at->format('H:i\ , d M Y') }}</td>
                </tr>
                <tr>
                    <th>Waktu akhir limit donasi</th>
                    <td>{{ $item->created_at->add('1 day')->format('H:i\ , d M Y') }}</td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td>{{ $item->shelter_account->bank }}
                        <br> {{ $item->shelter_account->account_number }}
                    </td>
                </tr>
                <tr>
                    <th>Bukti Pembayaran Donasi</th>
                    <td>
                        <img src="{{ Storage::url($item->proof_payment) }}" alt="" style="width: 1000px" class="img-thumbnail"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')

@endpush