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
}

// public function index(Request $request)
// {
//     $items = TravelPackage::with(['galleries'])->get();
//     return view('pages.home', [
//         'items' => $items
//     ]);
// }
