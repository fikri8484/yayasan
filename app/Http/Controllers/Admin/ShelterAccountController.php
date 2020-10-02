<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShelterAccountRequest;
use App\ShelterAccount;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class ShelterAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Activity::with(['activity_tag', 'activity_gallery'])->latest()->paginate(10);

        // return view('pages.admin.activity.index', [
        //     'items' => $items
        // ]);

        $bank = ShelterAccount::orderBy('id', 'DESC')->get();
        return view('pages.admin.bank.index', ['bank' => $bank]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.admin.activity.create');

        $bank = ShelterAccount::all();
        return view('pages.admin.bank.create', [
            'bank' => $bank
        ]);
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

        ShelterAccount::create($data);

        Alert::success('Success', 'Isi data berhasil');

        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $item = ShelterAccount::find($id);
        // return view('pages.admin.development.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ShelterAccount::findOrFail($id);

        return view('pages.admin.bank.edit', [
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

        $myData = ShelterAccount::findOrFail($id);

        $myData->bank = $request->get('bank');
        $myData->account_number = $request->get('account_number');
        $myData->on_name = $request->get('on_name');



        $myData->update();
        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ShelterAccount::find($id);
        $item->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('bank.index');
    }
}
