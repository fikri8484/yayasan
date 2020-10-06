<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DonationConfirmationRequest;
use App\Category;
use App\Program;
use App\DonationConfirmation;
use App\ShelterAccount;
use App\Development;
use App\User;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_selected', 1)->orderBy('id', 'DESC')->paginate(6);
        $programsNew = Program::orderBy('id', 'DESC')->where('is_selected', 0)->paginate(9);

        return view('pages.donation', compact('programs', 'programsNew'));
    }

    public function donasi(Request $request, $slug)
    {
        $program = Program::with(['donation_confirmation', 'developments'])
            ->where('slug', $slug)
            ->firstOrFail();
        // $create = $program->created_at->isoFormat('dddd, D MMMM Y');
        $create = $program->created_at->isoFormat('D-MM-Y');
        $time_is_up = \Carbon\Carbon::parse($program->time_is_up)->format('d-m-Y');

        // $tomorrow = \Carbon\Carbon::tomorrow('Asia/Jakarta');

        $akhir = \Carbon\Carbon::parse($program->time_is_up)->format('Y-m-d');
        $start_date = \Carbon\Carbon::now('Asia/Jakarta');
        $end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $akhir);
        $different_days = $start_date->diffInDays($end_date);

        // $tomorrow = \Carbon\Carbon::now('Asia/Jakarta')->add('1 day');


        return view('pages.donationdetail', compact('program', 'create', 'different_days', 'time_is_up'));
    }

    public function donasicreate(Request $request, $slug)
    { //yg sbelumnya
        $program = Program::with(['donation_confirmation'])
            ->where('slug', $slug)
            ->firstOrFail();

        $bank = ShelterAccount::all();
        return view('pages.createdonation', compact('program', 'bank'));
    }


    // public function donasicreate($id)
    // {
    //     $program = Program::with(['donation_confirmation'])->find($id);
    //     $bank = ShelterAccount::all();
    //     return view('pages.createdonation', compact('program', 'bank'));
    // }

    public function donasistore(Request $request)
    {

        request()->validate([
            'donor_name' => 'required|string',
            'nominal_donation' => 'required|integer',
            'shelter_accounts_id' => 'required|integer'
        ]);

        $donatur = new DonationConfirmation;
        $id_donatur_terakhir = $donatur->latest()->first()->id_transaction;

        if ($id_donatur_terakhir >= 950) {
            $id_donatur_terakhir = 0;
        }

        // $donatur = new DonationConfirmation;
        // $id_donatur_terakhir = $donatur->where('nominal_input', $request->nominal_donation)->where('shelter_accounts_id', $request->shelter_accounts_id)->latest()->first()->id_transaction;


        // $id_donatur_terakhir = $donatur->max('id');

        // $cek = DonationConfirmation::where('id', $id_donatur_terakhir)->first()->id_transaction;
        // dd($cek);

        // $id_donatur_terakhir = DonationConfirmation::max('id');

        // for ($x = 1; $x < $id_donatur_terakhir; $x++) {
        //     if ($data = DonationConfirmation::where('id', $x)->get('donation_status') == 'SUKSES') {
        //         $unique = DonationConfirmation::where('id', $x)->get('id_transaction');
        //         break;
        //     }
        // }

        // dd($unique);

        $i = 1;
        $id_transaction = $id_donatur_terakhir + $i;
        $donatur->programs_id = $request->programs_id;
        $donatur->users_id = $request->users_id;
        $donatur->id_transaction = $id_transaction;
        $donatur->donor_name = $request->donor_name;
        $donatur->shelter_accounts_id = $request->shelter_accounts_id;
        $donatur->nominal_input = $request->nominal_donation;
        $a = $id_transaction;
        $nominal_donation = $a + $request->nominal_donation;
        $donatur->nominal_donation = $nominal_donation;
        $donatur->email = $request->email;
        $donatur->support = $request->support;
        $bukti = 'null';
        $blmtf = 'BELUM_TRANSFER';
        $donatur->proof_payment = $bukti;
        $donatur->donation_status = $blmtf;
        $donatur->save();

        return redirect()->route('confirmdonation', ['id' => $donatur->id]);
    }

    public function confirmdonation(Request $request, $id)
    {
        $donatur = DonationConfirmation::with(['shelter_account'])->findOrFail($id);
        $program = Program::where('id', $donatur->programs_id)->first();

        $now = Carbon::now('Asia/Jakarta');
        $tomorrow = $now->add('1 day')->format('H:i\ , d M Y'); //Besok 13:20, 02 Oct 2020

        return view('pages.confirmdonation', compact('donatur', 'program', 'tomorrow'));
    }

    public function donasiconfirmstore(Request $request, $id)
    {
        $data = $request->all();
        request()->validate([
            'proof_payment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data['proof_payment'] = $request->file('proof_payment')->store(
            'assets/proof_payment',
            'public'
        );



        $item = DonationConfirmation::findOrFail($id);

        $item->update($data);

        // return redirect()->route('donation');
        return view('pages.thanks');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $pegawai = Program::where('title', 'like', "%" . $cari . "%")->paginate();

        $programs = Program::where('is_selected', 1)->orderBy('id', 'DESC')->paginate(6);
        $programsNew = Program::orderBy('id', 'DESC')->where('is_selected', 0)->paginate(9);

        return view('pages.donation', compact('programs', 'programsNew', 'pegawai'));
    }
}
