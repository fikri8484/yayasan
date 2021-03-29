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
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 " data-bgColor="#F9B9B9" value="{{ $program }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                        </div>

                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> {{ $program }} </h2>
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
                            <span class="badge badge-success badge-pill float-left mt-3">Up <i class="mdi mdi-trending-up"></i> </span>
                            <h2 class="font-weight-normal mb-1"> {{ $donatur_success+$donatur_object }} </h2>
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
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a" data-bgColor="#FFE6BA" value="{{ $donatur_pending+$donatur_pendinga }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                        </div>
                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> {{ $donatur_pending+$donatur_pendinga }} </h2>
                            <p class="text-muted mb-1">Donasi Pending</p>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-2">Jumlah Kegiatan Yayasan</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-left" dir="ltr">
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a" data-bgColor="#FFE6BA" value="{{ $activity }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                        </div>
                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> {{ $activity }} </h2>
                            <p class="text-muted mb-1">Kegiatan</p>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">

                    <h4 class="header-title mt-0 mb-3">Profil Website</h4>
                    
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#profil" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Profil</span>            
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#wa" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Tanya Admin (WA)</span>    
                                    </a>
                                </li>
                            </ul>
                      
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="profil">
                                    @foreach ($body as $item)
                                    <div class="dropdown float-right">
                                        <a href="{{ route('about.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-muted font-13"><strong>Nama Platform :</strong> <span class="ml-2">{{ $item->title }}</span></p>

                                        <p class="text-muted font-13"><strong>No. Hp :</strong><span class="ml-2">0{{ $item->whatsapp }}</span></p>

                                        <p class="text-muted font-13"><strong>Email :</strong> <span class="ml-2">{{ $item->email }}</span></p>

                                        <p class="text-muted font-13 m-b-5"><strong>Alamat :</strong> <span class="ml-2">{{ $item->address }}</span></p>

                                        <p class="text-muted font-13 m-b-5"><strong>Link Facebook :</strong> <span class="ml-2"> <a href="{{$item->fb}}" target="_blank" title="Facebook">{{ $item->fb }}</a></span></p>

                                        <p class="text-muted font-13 m-b-5"><strong>Foto :</strong> <span class="ml-2"><img src="{{ Storage::url($item->image1) }}" alt="" style="width: 250px" class="img-thumbnail">|||<img src="{{ Storage::url($item->image2) }}" alt="" style="width: 250px" class="img-thumbnail">|||<img src="{{ Storage::url($item->image3) }}" alt="" style="width: 250px" class="img-thumbnail"></span></p>

                                        <p class="text-muted font-13 m-b-5"><strong>Deskripsi :</strong> <span class="ml-2">{!! $item->description !!}</span></p>
                                    </div>
                                    @endforeach
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="wa">
                                    @foreach ($items as $wa)
                                    <div class="dropdown float-right">
                                        <a href="{{ route('contact.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-muted font-13"><strong>Nomor Hp :</strong> <span class="ml-2">{{ $wa->number }}</span></p>

                                        <p class="text-muted font-13"><strong>Isi Pesan :</strong><span class="ml-2">{{ $wa->message }}</span></p>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    
                        </div><!-- end col -->

                    </div>
                    <!-- end row -->

                </div>
            </div><!-- end col -->
        </div>

    </div> <!-- container -->

</div> <!-- content -->

@endsection