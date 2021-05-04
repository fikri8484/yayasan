<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityTagRequest;
use App\ActivityTag;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class ActivityTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ActivityTag::orderBy('id', 'DESC')->get();

        return view('pages.admin.activity-tag.index', [
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
        return view('pages.admin.activity-tag.create');
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityTagRequest $request)
    {
        $data = $request->all();


        ActivityTag::create($data);
        return redirect()->route('activity.create');
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
        $item = ActivityTag::findOrFail($id);

        return view('pages.admin.activity-tag.edit', [
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
        $myData = ActivityTag::findOrFail($id);

        $myData->tag = $request->get('tag');

        $myData->update();
        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('activity-tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ActivityTag::findOrFail($id);
        $item->delete();

        $data = Activity::where('activity_tags_id', $id);
        $data->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('activity-tag.index');
    }
}
