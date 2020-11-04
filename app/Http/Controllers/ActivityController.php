<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityTag;
use App\Body;
use App\Contact;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $tag = ActivityTag::all();
        $activity = Activity::with(['activity_gallery'])->orderBy('id', 'DESC')->paginate(8);
        $about = Body::orderBy('id', 'DESC')->paginate(1);
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('pages.activity', compact('tag', 'activity', 'about', 'contact'));
    }

    public function show(Request $request, $id)
    {
        $activity = Activity::with(['activity_gallery'])->where('activity_tags_id', $id)->orderBy('id', 'DESC')->paginate(8);
        $tag = ActivityTag::all();
        $about = Body::orderBy('id', 'DESC')->paginate(1);
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);
        return view('pages.activity', compact('tag', 'activity', 'about', 'contact'));
    }
}
