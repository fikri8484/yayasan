<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {

        $activity = Activity::with(['activity_gallery'])->latest()->paginate(6);
        return view('pages.activity', ['activity' => $activity]);
    }
}
