<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DonationConfirmation;
use Illuminate\Support\Facades\Auth;
use App\Program;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function donasi()
    {
        $info = DonationConfirmation::where('users_id', Auth::user()->id)->count();
        $totalDonation = DonationConfirmation::where('users_id', Auth::user()->id)->where('donation_status', 'SUKSES')->sum('nominal_donation');
        // $konfirCount = DonationConfirmation::where('users_id', Auth::user()->id)->where('isVerified', 0)->count();
        $donasi = DonationConfirmation::where('users_id', Auth::user()->id)->get();


        return view('pages.dashboard', compact('donasi', 'info', 'totalDonation'));
    }
}




// $programs = Program::all()->where('is_selected', 1);
// $programsNew = Program::orderBy('id', 'DESC')->where('is_selected', 0)->paginate(9);
// // dd($programsNew);
// return view('pages.donation', compact('programs', 'programsNew'));
// // public function index(Request $request)
// // {
// //     $items = TravelPackage::with(['galleries'])->get();
// //     return view('pages.home', [
// //         'items' => $items
// //     ]);
// // }
