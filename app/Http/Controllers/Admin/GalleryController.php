<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['gallery_category'])->latest()->paginate(7);

        return view('pages.admin.gallery.index', [
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
        $gallery_categories = GalleryCategory::all();
        return view('pages.admin.gallery.create', [
            'gallery_categories' => $gallery_categories
        ]);
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        Gallery::create($data);
        Alert::success('Success', 'Data Berhasil Ditambah');
        return redirect()->route('gallery.index');
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
        $item = Gallery::findOrFail($id);
        $gallery_categories = GalleryCategory::all();

        return view('pages.admin.gallery.edit', [
            'item' => $item,
            'gallery_categories' => $gallery_categories
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
        $image  = $request->file('image');
        if ($image != '') {
            request()->validate([
                'title' => 'required|max:255',
                'gallery_categories_id' => 'required|integer|exists:gallery_categories,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            $data = $request->all();
            $data['image'] = $request->file('image')->store(
                'assets/gallery',
                'public'
            );
        } else {
            request()->validate([
                'title' => 'required|max:255',
                'gallery_categories_id' => 'required|integer|exists:gallery_categories,id',
            ]);
            $data = $request->all();
        }
        $item = Gallery::findOrFail($id);
        $item->update($data);
        Alert::success('Success', 'Data Berhasil diedit');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();
        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('gallery.index');
    }
}
