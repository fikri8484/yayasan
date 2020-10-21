<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityTag;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $tag = ActivityTag::all();
        $activity = Activity::with(['activity_gallery'])->orderBy('id', 'DESC')->paginate(6);
        return view('pages.activity', compact('tag', 'activity'));
    }

    public function show(Request $request, $tag)
    {
        // $activity = $tag->activities()->latest()->paginate(6);
        // return view('pages.tag', compact('activity', 'activityTag'));
        $tag = ActivityTag::all();
        $activityTag = ActivityTag::with(['activities'])->where('tag', $tag)->firstOrFail();

        return view('pages.tag', compact('activityTag', 'tag'));
    }
}
