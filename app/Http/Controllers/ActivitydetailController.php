<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityTag;
use Illuminate\Http\Request;

class ActivitydetailController extends Controller
{

    public function index(Request $request, $slug)
    {
        $tag = ActivityTag::all();
        $activity = Activity::with(['activity_gallery'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.activitydetail', compact('activity', 'tag'));
    }
}
