<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DevelopmentRequest;
use App\Development;
use App\Program;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class DevelopmentController extends Controller
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

        $development = Development::orderBy('id', 'DESC')->get();
        return view('pages.admin.development.index', ['development' => $development]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.admin.activity.create');

        $development = Program::all();
        return view('pages.admin.development.create', [
            'development' => $development
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

        Development::create($data);

        Alert::success('Success', 'Isi data berhasil');

        return redirect()->route('development.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = Development::find($id);
        return view('pages.admin.development.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Development::findOrFail($id);
        $program = Program::all();

        return view('pages.admin.development.edit', [
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

        $myData = Development::findOrFail($id);
        $myData->programs_id = $request->get('programs_id');
        $myData->title = $request->get('title');
        $myData->description = $request->get('description');
        $myData->time = $request->get('time');



        $myData->update();
        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('development.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Development::find($id);
        $item->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('development.index');
    }
}
