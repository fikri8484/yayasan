<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DevelopmentRequest;
use App\DonationOfObject;
use App\DonationConfirmation;
use App\Program;
use App\ShelterAccount;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DonationConfirmation::with([
            'program', 'shelter_account', 'user'
        ])->orderBy('id', 'DESC')->get();

        return view('pages.admin.donatur.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::all();

        $bank = ShelterAccount::all();
        return view('pages.admin.donatur.create', compact('program', 'bank'));
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donatur = new DonationConfirmation;
        $id_donatur_terakhir = $donatur->latest()->first()->id_transaction;

        if ($id_donatur_terakhir >= 950) {
            $id_donatur_terakhir = 0;
        }

        $i = 1;
        $id_transaction = $id_donatur_terakhir + $i;
        $donatur->programs_id = $request->programs_id;
        $donatur->users_id = $request->users_id;
        $donatur->id_transaction = $id_transaction;
        $donatur->donor_name = $request->donor_name;
        $donatur->shelter_accounts_id = $request->shelter_accounts_id;

        $t = preg_replace('/[^0-9]/i', '', $request->nominal_donation);
        $venc = (int)$t;

        $donatur->nominal_input = $venc;
        $a = $id_transaction;
        $nominal_donation = $venc;
        $donatur->nominal_donation = $nominal_donation;
        $donatur->phone = $request->phone;
        $donatur->email = $request->email;
        $donatur->support = $request->support;
        $bukti = 'null';
        $tf = 'SUKSES';
        $donatur->proof_payment = $bukti;
        $donatur->donation_status = $tf;

        request()->validate([
            'donor_name' => 'required|string',
            // 'nominal_donation' => 'required|numeric|min:10.000',
            'shelter_accounts_id' => 'required|integer'
        ]);

        $donatur->save();

        //tambah nominal ke program
        $program = Program::where('id', $request->programs_id)->sum('donation_collected');

        $tambah = $venc + $program;

        $programs = Program::where('id', $request->programs_id)->first();
        $programs->update(['donation_collected' => $tambah]);


        Alert::success('Success', 'Isi data berhasil');

        return redirect()->route('donatur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = DonationConfirmation::with([
            'program', 'shelter_account', 'user'
        ])->findOrFail($id);

        return view('pages.admin.donatur.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DonationConfirmation::findOrFail($id);

        return view('pages.admin.donatur.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();

        $item = DonationConfirmation::findOrFail($id);

        $item->update($data);

        // $myData = $item->donation_status;
        // if ($myData == 'SUKSES') {
        //     $konfirmasi = DonationConfirmation::findOrFail($id);
        //     $collected = DonationConfirmation::where('programs_id', $konfirmasi->programs_id)->sum('nominal_donation');
        //     $program = Program::where('id', $konfirmasi->programs_id)->first();
        //     $program->update(['donation_collected' => $collected]);
        // }
        $myData = $item->donation_status;
        if ($myData == 'SUKSES') {
            $konfirmasi = DonationConfirmation::findOrFail($id);
            $collected = DonationConfirmation::where('id', $id)->sum('nominal_donation');


            $program = Program::where('id', $konfirmasi->programs_id)->sum('donation_collected');
            // $tambah = $collected->sum($program);

            $tambah = $collected + $program;

            $programs = Program::where('id', $konfirmasi->programs_id)->first();
            $programs->update(['donation_collected' => $tambah]);
        } else if ($myData == 'DITOLAK') {
            $konfirmasi = DonationConfirmation::findOrFail($id);
            $collected = DonationConfirmation::where('id', $id)->sum('nominal_donation');


            $program = Program::where('id', $konfirmasi->programs_id)->sum('donation_collected');
            // $tambah = $collected->sum($program);

            $tambah = $program - $collected;

            $programs = Program::where('id', $konfirmasi->programs_id)->first();
            $programs->update(['donation_collected' => $tambah]);
        }


        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('donatur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DonationConfirmation::findorFail($id);
        $item->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('donatur.index');
    }
}
