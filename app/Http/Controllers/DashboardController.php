<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        // return view('dashboard');
        //$user = session('user');
        $user = $request->session()->get('user');

        // Pass user data to the view
        

        // If the session does not contain user data, redirect back to login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Pass the user data to the dashboard view
        return view('dashboard', compact('user'));
    }
}