<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryCategoryRequest;
use App\GalleryCategory;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GalleryCategory::orderBy('id', 'DESC')->get();

        return view('pages.admin.category.index', [
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
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCategoryRequest $request)
    {
        $data = $request->all();

        GalleryCategory::create($data);
        return redirect()->route('gallery.create');
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
        $item = GalleryCategory::findOrFail($id);

        return view('pages.admin.category.edit', [
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
        $myData = GalleryCategory::findOrFail($id);

        $myData->category = $request->get('category');

        $myData->update();
        Alert::success('Success', 'Data Berhasil diubah');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GalleryCategory::findOrFail($id);
        $item->delete();

        $data = Gallery::where('gallery_categories_id', $id);
        $data->delete();

        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('category.index');
    }
}
