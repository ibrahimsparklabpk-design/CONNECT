<?php

namespace App\Http\Controllers\backend\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function userDashboard()
    {
        return view('user.layout.master');
    }
    public function create()
    {
        return view('user.auth.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ✅ Create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'vendor'; // default role
        $user->save();

        // ✅ Login user automatically (optional)
        Auth::login($user);

        // ✅ Redirect according to role
        if ($user->role === 'vendor') {
            return redirect()->route('dashboard')->with('success', 'Vendor registered successfully!');
        } elseif ($user->role === 'admin') {
            return redirect()->route('dashboard.user')->with('success', 'Admin registered successfully!');
        } else {
            return redirect()->route('user.signin')->with('success', 'User registered successfully!');
        }
    }


    public function signIn()
    {
        return view('user.auth.signIn');
    }

public function login(Request $request)
{
    // Validate login input
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Attempt login with default web guard
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user(); // logged-in user

        // Redirect based on role
        if ($user->role === 'vendor') {
            return redirect()->route('dashboard')->with('success', 'Vendor logged in successfully!');
        } elseif ($user->role === 'admin') {
            return redirect()->route('user.dashboard')->with('success', 'Admin logged in successfully!');
        } else {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }
    }

    // Login failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

}