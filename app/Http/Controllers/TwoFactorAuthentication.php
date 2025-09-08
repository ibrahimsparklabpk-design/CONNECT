<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFactorAuthentication extends Controller
{
    public function TwoFactorAuthenticationDisplay()
    {
        return view('twoFactorAuthentication');
    }
}
