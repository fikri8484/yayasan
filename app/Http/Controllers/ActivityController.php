<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {

        $activity = Activity::with(['activity_gallery'])->get();
        return view('pages.activity', [
            'activity' => $activity
        ]);
    }
}

// public function index(Request $request)
// {
//     $items = TravelPackage::with(['galleries'])->get();
//     return view('pages.home', [
//         'items' => $items
//     ]);
// }
