<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contact;
use App\Http\Requests\Admin\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Contact::orderBy('id', 'DESC')->get();

        return view('pages.admin.contact.index', [
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
        $contacts = Contact::all();
        return view('pages.admin.contact.create', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $data = $request->all();

        Contact::create($data);
        Alert::success('Success', 'Data Berhasil Ditambah');
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Contact::findOrFail($id);
        return view('pages.admin.contact.edit', [
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
        request()->validate([
            'number' => 'required|integer',
            'message' => 'required|string',
        ]);
        $data = $request->all();
        $item = Contact::findOrFail($id);
        $item->update($data);
        Alert::success('Success', 'Data Berhasil diedit');
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Contact::findOrFail($id);
        $item->delete();
        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('contact.index');
    }
}
