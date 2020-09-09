@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card-box">


                    <h4 class="header-title mt-0 mb-4">Total Open Donasi</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-left" dir="ltr">
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 " data-bgColor="#F9B9B9" value="58" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                        </div>

                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> 256 </h2>
                            <p class="text-muted mb-1">Donasi</p>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3">Jumlah Donatur</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-right">
                            <span class="badge badge-success badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                            <h2 class="font-weight-normal mb-1"> 8451 </h2>
                            <p class="text-muted mb-3">Donatur</p>
                        </div>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-2">Menunggu Konfirmasi Donasi</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-left" dir="ltr">
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a" data-bgColor="#FFE6BA" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                        </div>
                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> 3 </h2>
                            <p class="text-muted mb-1">Donasi Pending</p>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

@endsection