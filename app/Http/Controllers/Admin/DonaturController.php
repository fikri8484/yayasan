<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DevelopmentRequest;
use App\DonationConfirmation;
use App\Program;

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
        ])->get();

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
        // return view('pages.admin.activity.create');
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        DonationConfirmation::create($data);
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

        $myData = $item->donation_status;
        if ($myData == 'SUKSES') {
            $konfirmasi = DonationConfirmation::find($id);
            $collected = DonationConfirmation::where('programs_id', $konfirmasi->programs_id)->sum('nominal_donation');
            $program = Program::where('id', $konfirmasi->programs_id)->first();
            $program->update(['donation_collected' => $collected]);
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
