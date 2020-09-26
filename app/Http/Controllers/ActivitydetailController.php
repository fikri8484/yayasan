<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivitydetailController extends Controller
{

    public function index(Request $request, $slug)
    {
        $activity = Activity::with(['activity_gallery'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.activitydetail', [
            'activity' => $activity
        ]);
    }
}
