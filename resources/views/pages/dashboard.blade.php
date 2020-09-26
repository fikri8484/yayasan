@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div role="main" class="main">
    <div id="dashboard">
        @foreach($donasi as $d)
        <div class="container pb-5">
            <div class="row pt-5">
                <div class="col-md-12">


                    <div class="tabs tabs-vertical tabs-left">

                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a class="nav-link" href="#overview" data-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#donasisaya" data-toggle="tab">Donasi Saya <i>({{ $d->user->name }})</i></a>
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
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="featured-boxes featured-boxes-modern-style-2 featured-boxes-modern-style-2-hover-only featured-boxes-modern-style-primary m-0 mb-4">
                                            <div class="featured-box featured-box-no-borders featured-box-box-shadow">
                                                <span class="box-content px-1 py-4 text-center d-block">
                                                    <span class="text-primary text-8 position-relative top-3 mt-3"><i class="fas fa-heart"></i></span>
                                                    <span class="elements-list-shadow-icon text-default"><i class="fa fa-heart"></i></span>
                                                    <p>{{ $info }}</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="featured-boxes featured-boxes-modern-style-2 featured-boxes-modern-style-2-hover-only featured-boxes-modern-style-primary m-0 mb-4">
                                            <div class="featured-box featured-box-no-borders featured-box-box-shadow">
                                                <span class="box-content px-1 py-4 text-center d-block">
                                                    <span class="text-primary text-8 position-relative top-3 mt-3"><i class="fas fa-dollar-sign"></i></span>
                                                    <span class="elements-list-shadow-icon text-default"><i class="fa fa-dollar-sign"></i></span>
                                                    <p>@currency($totalDonation) Donasi Tersalurkan</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="donasisaya" class="tab-pane">
                                <div class="col-lg-6 float-right">
                                    <form role="search" class="d-flex w-30 pb-2 mb-2" action="page-search-results.html" method="get">
                                        <div class="simple-search input-group w-30">
                                            <input class="form-control border-0 bg-color-grey
                            id=" headerSearch" name="q" type="search" value="" placeholder="Cari Donasi Saya..." />
                                            <span class="input-group-append bg-color-secondary border-0">
                                                <button class="btn" type="submit">
                                                    <i class="fa fa-search header-nav-top-icon"></i>
                                                </button>
                                            </span>
                                        </div>
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
                                            <td>
                                                {{ $d->program->title }}
                                                <a href="/donasi">
                                                    <i class="fa fa-eye"></i></a>
                                            </td>
                                            <td> @currency($d->nominal_donation)</td>
                                            <td>{{ $d->created_at }}</td>
                                            <td class="btn btn-primary">{{ $d->donation_status }}
                                            </td>




                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="btn btn-secondary">
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