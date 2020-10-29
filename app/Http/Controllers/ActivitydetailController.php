<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityTag;
use App\Body;
use App\Contact;
use Illuminate\Http\Request;

class ActivitydetailController extends Controller
{

    public function index(Request $request, $slug)
    {
        $tag = ActivityTag::all();
        $activity = Activity::with(['activity_gallery'])
            ->where('slug', $slug)
            ->firstOrFail();

        $about = Body::orderBy('id', 'DESC')->paginate(1);
        $contact = Contact::orderBy('id', 'DESC')->paginate(1);

        return view('pages.activitydetail', compact('activity', 'tag', 'about', 'contact'));
    }
}
