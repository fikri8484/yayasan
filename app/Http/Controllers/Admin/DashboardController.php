<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Program;
use App\DonationConfirmation;
use App\Body;
use App\Contact;
use App\DonationOfObject;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $body = Body::orderBy('id', 'DESC')->get();
        $items = Contact::orderBy('id', 'DESC')->get();
        return view('pages.admin.dashboard', [
            'activity' => Activity::count(),
            'program' => Program::where('is_published', 1)->count(),
            'donatur_object' => DonationOfObject::count(),
            'donatur_pending' => DonationConfirmation::where('donation_status', 'SUDAH_KONFIRM')->count(),
            'donatur_pendinga' => DonationConfirmation::where('donation_status', 'BELUM_TRANSFER')->count(),
            'donatur_success' => DonationConfirmation::where('donation_status', 'SUKSES')->count(),
            'body' => $body,
            'items' => $items
        ]);
    }
}
