<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function create()
    {
        return view('pages.createdonation');
    }
    public function captchaValidate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha'
        ]);
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
