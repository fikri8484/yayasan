<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'DESC')->paginate(12);
        $category = GalleryCategory::all();
        return view('pages.gallery', compact('gallery', 'category'));
    }
}
