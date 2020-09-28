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

class DonationController extends Controller
{
    public function index()
    {
        $programs = Program::all()->where('is_selected', 1);
        $programsNew = Program::orderBy('id', 'DESC')->where('is_selected', 0)->paginate(9);
        // dd($programsNew);
        return view('pages.donation', compact('programs', 'programsNew'));
    }

    public function donasi(Request $request, $slug)
    {
        $program = Program::with(['donation_confirmation', 'developments'])
            ->where('slug', $slug)
            ->firstOrFail();

        $create = $program->created_at->isoFormat('dddd, D MMMM Y');
        // $ubah = Carbon::createFromFormat('date', 'time_is_up')->toDateTimeString();

        return view('pages.donationdetail', compact('program', 'create'));
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
        $donatur = new DonationConfirmation;
        $id_donatur_terakhir = $donatur->latest()->first()->id_transaction;

        if ($id_donatur_terakhir >= 399) {
            $id_donatur_terakhir = 0;
        }

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
        $bukti = 'a';
        $blmtf = 'BELUM_TRANSFER';
        $donatur->proof_payment = $bukti;
        $donatur->donation_status = $blmtf;
        $donatur->save();

        return redirect()->route('confirmdonation', ['id' => $donatur->id]);
    }

    // public function confirmdonation($id)
    // {

    //     // $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
    //     // return view('pages.checkout', [
    //     //     'item' => $item
    //     // ]);

    //     // $donatur = DonationConfirmation::find($id);
    //     $donatur = DonationConfirmation::with(['shelter_account'])->findOrFail($id);
    //     $program = Program::where('id', $donatur->programs_id)->first();
    //     // $bank = ShelterAccount::where('id', $donatur->);
    //     return view('pages.confirmdonation', compact('donatur', 'program'));
    // }

    // public function donasistore2(Request $request)
    // {
    //     $donatur = new DonationConfirmation;

    //     $proof_payment['proof_payment'] = $request->file('iamge')->store(
    //         'assets/confirm-donation',
    //         'public'
    //     );
    //     dd($donatur);

    //     DonationConfirmation::create($donatur);
    //     return redirect()->route('/donasi');
    // }

    public function confirmdonation(Request $request, $id)
    {
        $donatur = DonationConfirmation::with(['shelter_account'])->findOrFail($id);
        $program = Program::where('id', $donatur->programs_id)->first();

        return view('pages.confirmdonation', compact('donatur', 'program'));
    }

    public function donasiconfirmstore(Request $request, $id)
    {
        // $program = $request->all();

        // $donatur = DonationConfirmation::where('id', $id)->first();
        // $collected = DonationConfirmation::where('programs_id', $donatur->programs_id)->sum('nominal_donation');
        // $program = Program::where('id', $donatur->programs_id)->first();


        // if ($request->file('proof_payment')) {
        //     $file       = $request->file('proof_payment');
        //     $fileName   = $file->getClientOriginalName();
        //     $request->file('proof_payment')->move("images/proof_payment/", $fileName);
        //     $bukti = $donatur->proof_payment = $fileName;
        //     $donatur->update(['donation_status' => 'SUDAH_KONFIRM', 'proof_payment' => $bukti]);
        // }
        // dd($donatur);
        // $program->update(['donation_collected' => $collected]);
        $data = $request->all();
        $data['proof_payment'] = $request->file('proof_payment')->store(
            'assets/proof_payment',
            'public'
        );




        $item = DonationConfirmation::findOrFail($id);

        $item->update($data);

        // return redirect()->route('donation');
        return view('pages.thanks');
    }
}
