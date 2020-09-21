<?php

namespace App\Http\Controllers;


use App\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {

        $category = GalleryCategory::all();
        return view('pages.gallery', ['category' => $category]);
    }
}
