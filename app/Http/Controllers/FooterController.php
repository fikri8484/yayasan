<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Gallery;
use App\Activity;
use Carbon\Carbon;

class FooterController extends Controller
{
    public function index()
    {

        $donasi = Program::where('is_selected', 1)->orderBy('id', 'DESC')->paginate(2);

        $activity = Activity::with(['activity_gallery'])->orderBy('id', 'DESC')->paginate(1);
        return view('includes.footer', compact('donasi', 'activity'));
    }
}
