@extends('layouts.admin')
@section('title', $item->title)
@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Data Donatur Donasi @if ($item->title == null)
            *nama program telah dihapus*                
            @else
                {{ $item->title }}
            @endif</h1>
            
        </div>
      
            
        
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <p>Total Donasi Terkumpul : @currency( $item->donation_confirmation->where('donation_status', 'SUKSES')->sum('nominal_donation') )</p>
                    <p>Periode Donasi : {{ $item->created_at->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->time_is_up)->format('d M Y') }}</p>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Donatur</th>   
                                <th>Tgl Donasi</th>
                                <th>Nominal/Barang</th>
                                <th>Doa/Dukungan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @foreach($item->donation_confirmation->where('donation_status','SUKSES')->sortByDesc('id') as $donatur)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $donatur->donor_name }}</td>
                                <td>{{ $donatur->created_at->format('d M Y') }}</td>
                                <td>@currency($donatur->nominal_donation) </td>
                                <td>@if ($donatur->support == null)
                                    ----
                                @else
                                {{ $donatur->support }}                                    
                                @endif</td>
                            </tr>
                            @endforeach
                
                          
                          @foreach ($item->donation_object->sortByDesc('id') as $donaturb)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $donaturb->donor_name }}</td>
                                <td>{{ $donaturb->created_at->format('d M Y') }}</td>
                                <td>{{ $donaturb->object }}</td>
                                <td>@if ($donaturb->support == null)
                                    ----
                                @else
                                {{ $donaturb->support }}                                    
                                @endif</td>
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

@push('addon-style')
<link href="{{ url('backend/dist/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('backend/dist/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('backend/dist/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('addon-script')
<script src="{{ url('backend/dist/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('backend/dist/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
@endpush