<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BodyRequest;
use App\Body;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class BodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $body = Body::orderBy('id', 'DESC')->get();
        return view('pages.admin.dashboard', ['body' => $body]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $body = Body::all();
        return view('pages.admin.about.create', [
            'body' => $body
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BodyRequest $request)
    {
        request()->validate([
            'image1' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        $data = $request->all();
        $data['image1'] = $request->file('image1')->store(
            'assets/about',
            'public'
        );

        $data['image2'] = $request->file('image2')->store(
            'assets/about',
            'public'
        );

        $data['image3'] = $request->file('image3')->store(
            'assets/about',
            'public'
        );

        Body::create($data);

        Alert::success('Success', 'Data Berhasil Ditambah');
        return redirect()->route('about.index');
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
        $item = Body::findOrFail($id);

        return view('pages.admin.about.edit', [
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
    public function update(BodyRequest $request, $id)
    {
        request()->validate([
            'image1' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();
        $data['image1'] = $request->file('image1')->store(
            'assets/about',
            'public'
        );
        $data['image2'] = $request->file('image2')->store(
            'assets/about',
            'public'
        );
        $data['image3'] = $request->file('image3')->store(
            'assets/about',
            'public'
        );
        $item = Body::findOrFail($id);
        $item->update($data);
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Body::findOrFail($id);
        $item->delete();
        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('about.index');
    }
}
