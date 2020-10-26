@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div role="main" class="main">
    <div id="dashboard">

        <div class="container pb-5">
            <div class="row pt-5">
                <div class="col-md-12">


                    <div class="tabs tabs-vertical tabs-left">

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">Overview</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/donasiSaya" data-toggle="tab">Donasi Saya <i></i></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link bg-color-secondary" href="/logout" style="color: white">Keluar</a>
                            </li> -->
                            <li>
                                <form action="{{ url('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ url('logout') }}" class="dropdown-item notify-item">
                                        <button class="btn btn-secondary" type="submit"><i class="fe-log-out pb-3">Logout</button></i>

                                    </a>
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content">


                            <div id="donasisaya" class="tab-pane active">
                                <div class="col-lg-6">
                                    <form action="/dashboardb/cari" method="GET" class="form-inline">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Cari nominal donasi..." name="cari" value="{{ old('cari') }}">
                                        <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Cari">
                                    </form>
                                </div>

                                <table class="table pt-4 mt-4">
                                    <thead>
                                        <tr>
                                            <th>Program</th>
                                            <th>Nominal</th>
                                            <th>Tanggal Donasi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            @foreach($donasi->sortByDesc('id') as $d)

                                            <td>
                                                {{ $d->program->title }}
                                                <a href="{{ route('detail-donation', $d->program->slug) }}" target="_blank">
                                                    <i class="fa fa-eye"></i></a>
                                            </td>
                                            <td> @currency($d->nominal_donation)</td>
                                            <td>{{ $d->created_at->format('d-M-Y') }}</td>
                                            @if($d->donation_status == 'SUKSES')
                                            <td class="btn btn-secondary">{{ $d->donation_status }}
                                            </td>
                                            @else
                                            <td class="btn btn-danger">{{ $d->donation_status }}
                                            </td>

                                            @endif
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {!! $donasi->links() !!}
                                <div class="btn btn-primary">
                                    <a href="/donasi" style="color: white">Donasi Program Lain</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
@endsection