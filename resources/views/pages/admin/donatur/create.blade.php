@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
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
            <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
                @csrf

                <div class="form-group">
                    <label for="programs_id">Program Donasi </label>
                    <select name="programs_id" required class="form-control">
                        <option value="">Pilih Program Donasi</option>
                        @foreach ($program as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->title }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="donor_name">Nama</label>
                    <input type="text" class="form-control" name="donor_name" placeholder="Nama" value="{{ old('donor_name') }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="phone">No. Handphone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Nomor Handphone Aktif Anda" value="{{ old('phone') }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="nominal_donation">Nominal Donasi</label>
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                                Rp
                            </span>
                        </span>
                        <input type="text" class="form-control" name="nominal_donation" value="{{ old('nominal_donation') }}" required autocomplete="off" id="rupiah">
                    </div>

                </div>
                <div class="form-group">
                    <label for="shelter_accounts_id">Transfer Bank </label>
                    <select name="shelter_accounts_id" required class="form-control" onclick="GFG_Fun();">
                        <option value="">Pilih Bank Tujuan Transfer</option>
                        @foreach ($bank as $bank)
                        <option value="{{ $bank->id }}">
                            {{ $bank->bank }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="support">Dukungan / Doa <i>(Optional/Boleh kosong)</i></label>
                    <input type="textarea" class="form-control" name="support" placeholder="Semoga Menjadi Amal Jariyah" value="{{ old('support') }}">
                </div>


                <br><br>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')
<script type="text/javascript">
    var inputs, index;
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, '');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>

<script>
    function validateForm() {
        var x = document.forms["myForm"]["phone"].value;
        if (x > 999999999999) {
            alert("Masukkan Nomor HP Dengan Benar");
            return false;
        }
    }
</script>


@endpush