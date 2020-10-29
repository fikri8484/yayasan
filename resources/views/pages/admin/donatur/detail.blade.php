@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Donasi @if($item->program == null) (null) @else {{ $item->program->title }} @endif</h1>
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
                    @if($item->program == null)
                    <td>(Nama Program Sudah Dihapus)</td>
                    @else
                    <td>{{ $item->program->title }}</td>
                    @endif
                </tr>
                <tr>
                    <th>Donatur</th>
                    <td>{{ $item->donor_name }}</td>
                </tr>
                <tr>
                    <th>Nomor Hp</th>
                    <td>0{{ $item->phone }}</td>
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
                    @if($item->shelter_account == null)
                    <td>(Data Rekening Sudah Dihapus)</td>
                    @else
                    <td>{{ $item->shelter_account->bank }}
                        <br> {{ $item->shelter_account->account_number }}
                    </td>
                    @endif
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