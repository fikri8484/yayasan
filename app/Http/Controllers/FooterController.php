<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Body;
use App\Contact;

class FooterController extends Controller
{
    public function index()
    {

        $footer = Body::orderBy('id', 'DESC')->paginate(1);
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('includes.footer', compact('footer1', 'contact'));
    }
}
