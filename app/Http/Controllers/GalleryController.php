<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryCategory;
use App\Contact;
use App\Body;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy('id', 'DESC')->paginate(12);
        $category = GalleryCategory::all();
        $about = Body::orderBy('id', 'DESC')->paginate(1);
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('pages.gallery', compact('gallery', 'category', 'about', 'contact'));
    }
}
