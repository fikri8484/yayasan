<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Body;
use App\Contact;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $about = Body::orderBy('id', 'DESC')->paginate(1);
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('pages.about', compact('about', 'contact'));
    }
}
