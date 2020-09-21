<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramRequest;
use App\Program;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::all();
        return view('pages.admin.program.index', ['program' => $program]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        return view('pages.admin.program.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/program',
            'public'
        );

        Program::create($data);

        Alert::success('Success', 'Data Berhasil Ditambah');
        return redirect()->route('program.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Program::find($id);
        return view('pages.admin.program.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Program::findOrFail($id);

        return view('pages.admin.program.edit', [
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
    public function update(ProgramRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Program::findOrFail($id);

        $item->update($data);

        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Program::findOrFail($id);
        $item->delete();
        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect()->route('program.index');
    }
}
