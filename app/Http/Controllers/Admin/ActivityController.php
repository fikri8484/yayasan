<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityRequest;
use App\Activity;
use App\ActivityGallery;
use App\ActivityTag;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class ActivityController extends Controller
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

        $activity = Activity::orderBy('id', 'DESC')->get();
        return view('pages.admin.activity.index', ['activity' => $activity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.admin.activity.create');

        $activity_tags = ActivityTag::all();
        return view('pages.admin.activity.create', [
            'activity_tags' => $activity_tags
        ]);
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $myData = Activity::create($data);

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $dataGallery['activities_id'] = $myData->id;
                $dataGallery['image'] = $file->store(
                    'assets/activity-gallery',
                    'public'
                );
                ActivityGallery::create($dataGallery);
            }
        }
        Alert::success('Success', 'Isi data berhasil');

        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = Activity::find($id);
        return view('pages.admin.activity.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Activity::findOrFail($id);
        $activity_tags = ActivityTag::all();

        return view('pages.admin.activity.edit', [
            'item' => $item,
            'activity_tags' => $activity_tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = ActivityGallery::where('activities_id', $id);
        $item->delete();

        $myData = Activity::findOrFail($id);

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $dataGallery['activities_id'] = $myData->id;
                $dataGallery['image'] = $file->store(
                    'assets/activity-gallery',
                    'public'
                );
                ActivityGallery::create($dataGallery);
            }
        }
        $myData->activity_tags_id = $request->get('activity_tags_id');
        $myData->title = $request->get('title');
        $myData['slug'] = Str::slug($request->title);
        $myData->description = $request->get('description');
        $myData->time = $request->get('time');

        $myData->update();

        Alert::success('Success', 'Data Berhasil Diubah');

        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Activity::find($id);
        $item->delete();
        $item = ActivityGallery::where('activities_id', $id);
        $item->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('activity.index');
    }
}
