<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityGalleryRequest;
use App\ActivityGallery;
use App\ActivityTag;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ActivityGallery::with(['activity', 'activity_tag'])->get();

        return view('pages.admin.activity-gallery.index', [
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
        $activities = Activity::all();
        return view('pages.admin.activity-gallery.create', [
            'activities' => $activities
        ]);
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityGalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/activity-gallery',
            'public'
        );

        ActivityGallery::create($data);
        return redirect()->route('activity.detail');
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
        $item = ActivityGallery::findOrFail($id);
        $activities = Activity::all();

        return view('pages.admin.activity-gallery.edit', [
            'item' => $item,
            'activities' => $activities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityGalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/activity-gallery',
            'public'
        );

        $item = ActivityGallery::findOrFail($id);
        $item->update($data);
        return redirect()->route('activity.detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ActivityGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('activity.index');
    }
}
