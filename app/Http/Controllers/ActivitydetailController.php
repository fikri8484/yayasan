<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitydetailController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.activitydetail');
    }
}
