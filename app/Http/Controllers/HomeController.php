<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Gallery;
use App\Activity;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $program = Program::where('is_selected', 1)->orderBy('id', 'DESC')->get();
        $gallery = Gallery::orderBy('id', 'DESC')->get();
        $activity = Activity::with(['activity_gallery'])->orderBy('id', 'DESC')->get();
        return view('pages.home', compact('program', 'gallery', 'activity', 'today'));
    }
}
