<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSlideRequest;
use App\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class HomeSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = HomeSlide::orderBy('id', 'DESC')->get();

        return view('pages.admin.homeSlide.index', [
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
        $home_slides = HomeSlide::all();
        return view('pages.admin.homeSlide.create', [
            'home_slides' => $home_slides
        ]);
    }

    /**
     * Store a newly created resource in storage. store utk nyimpan data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeSlideRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/home-slides',
            'public'
        );

        HomeSlide::create($data);
        Alert::success('Success', 'Data Berhasil Ditambah');
        return redirect()->route('homeSlide.index');
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
        $item = HomeSlide::findOrFail($id);
        return view('pages.admin.homeSlide.edit', [
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
        $image  = $request->file('image');
        if ($image != '') {
            request()->validate([
                'title' => 'required|max:25',
                'description' => 'required|max:25',
                'image' => 'required|image'
            ]);
            $data = $request->all();
            $data['image'] = $request->file('image')->store(
                'assets/home-slides',
                'public'
            );
        } else {
            request()->validate([
                'title' => 'required|max:25',
                'description' => 'required|max:25',
            ]);
            $data = $request->all();
        }
        $item = HomeSlide::findOrFail($id);
        $item->update($data);
        Alert::success('Success', 'Data Berhasil diedit');
        return redirect()->route('homeSlide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = HomeSlide::findOrFail($id);
        $item->delete();
        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('homeSlide.index');
    }
}
