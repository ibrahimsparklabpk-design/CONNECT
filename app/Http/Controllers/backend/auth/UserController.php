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

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->back()->with('success', 'User registered successfully!');
}


public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }
    Auth::login($user);

    return redirect()->route('user.dashboard')->with('success', 'Login successful!');
}
}