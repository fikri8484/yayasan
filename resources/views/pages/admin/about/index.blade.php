@extends('layouts.admin')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-2">
            <h1 class="h3 mb-0 text-gray-800">Tentang Sedekah Jariah</h1>
            <a href="{{ route('about.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
            </a>
        </div>

        @foreach ($body as $item)
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $item->title }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{!! $item->description !!}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->address }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Whatsapp Admin</th>
                        <td>{{ $item->whatsapp }}</td>
                    </tr>
                    <tr>
                        <th>Link Facebook</th>
                        <td>{{ $item->fb }}</td>
                    </tr>
                    <tr>
                        <th>Foto 1 (Utama)</th>
                        <td>
                            <img src="{{ Storage::url($item->image1) }}" alt="" style="width: 250px" class="img-thumbnail"></td>
                    </tr>
                    <tr>
                        <th>Foto 2</th>
                        <td>
                            <img src="{{ Storage::url($item->image2) }}" alt="" style="width: 250px" class="img-thumbnail"></td>
                    </tr>
                    <tr>
                        <th>Foto 3</th>
                        <td>
                            <img src="{{ Storage::url($item->image3) }}" alt="" style="width: 250px" class="img-thumbnail"></td>
                    </tr>
                    <tr>
                        <th>Aksi</th>
                        <td> <a href="{{ route('about.edit', $item->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('about.destroy', $item->id) }}" method="POST" onclick="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
        @endforeach

    </div> <!-- container -->

</div> <!-- content -->

@endsection

@push('addon-script')


@endpush