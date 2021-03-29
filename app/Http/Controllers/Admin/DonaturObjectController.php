<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DonationOfObject;
use App\Program;

use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\Admin\DonationOfObjectRequest;

class DonaturObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DonationOfObject::with([
            'program', 'user'
        ])->orderBy('id', 'DESC')->get();

        return view('pages.admin.donaturobject.index', [
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

        return view('pages.admin.donaturobject.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationOfObjectRequest $request)
    {

        $data = $request->all();

        DonationOfObject::create($data);

        Alert::success('Success', 'Isi data berhasil');

        return redirect()->route('donaturobject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DonationOfObject::findOrFail($id);
        $program = Program::all();

        return view('pages.admin.donaturobject.edit', [
            'item' => $item,
            'program' => $program
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
        $myData = DonationOfObject::findOrFail($id);
        $myData->programs_id = $request->get('programs_id');
        $myData->donor_name = $request->get('donor_name');
        $myData->phone = $request->get('phone');
        $myData->object = $request->get('object');
        $myData->support = $request->get('support');



        $myData->update();
        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('donaturobject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DonationOfObject::findorFail($id);
        $item->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('donaturobject.index');
    }
}
