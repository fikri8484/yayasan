<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Gallery;
use App\Activity;
use App\HomeSlide;
use App\Contact;
use App\Body;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $about = Body::orderBy('id', 'DESC')->paginate(1);
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $program = Program::where('is_selected', 1)->where('is_published', 1)->orderBy('id', 'DESC')->paginate(3);
        $gallery = Gallery::orderBy('id', 'DESC')->paginate(8);
        $activity = Activity::with(['activity_gallery'])->orderBy('id', 'DESC')->paginate(3);
        $modal = Program::where('is_selected', 1)->where('is_published', 1)->orderBy('id', 'DESC')->paginate(2);
        $slide = HomeSlide::get();
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('pages.home', compact('program', 'gallery', 'activity', 'today', 'modal', 'slide', 'contact', 'about'));
    }
}
