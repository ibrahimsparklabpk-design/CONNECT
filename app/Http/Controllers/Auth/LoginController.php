<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BusinessRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    // public function login(Request $request)
    // {

    //     $request->validate([
    //         'email_address' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = DB::table('register_table')
    //         ->where('email_address', $request->email_address)
    //         ->first();


    //     if (!$user) {

    //         $user = DB::table('admin')
    //             ->where('email_address', $request->email_address)
    //             ->first();

    //         if ($user && $user->password === $request->password) {

    //             session(['user' => $user, 'role' => 'admin']); 
    //             return redirect()->route('admin_dashboard');
    //         }
    //     }


    //     if ($user && $user->password === $request->password) {

    //         session(['user' => $user, 'role' => 'regular']); 
    //         return redirect()->route('index'); 
    //     }


    //     return back()->with('error', 'Invalid email or password.');
    // }




  public function login(Request $request)
{
    // ✅ Validate login form input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // ✅ Try logging in as business (via Auth guard)
    $credentials = [
        'Email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::guard('business')->attempt($credentials)) {
        return redirect()->route('dashboard.index')
            ->with('success', 'Business logged in successfully!');
    }

    // ✅ If business login fails, try regular user (manual check)
    $user = DB::table('business_registrations')
        ->where('Email', $request->email)
        ->first();

    if ($user && Hash::check($request->password, $user->Password)) {
        session(['user' => $user, 'role' => 'regular']);
        return redirect()->route('dashboard.index');
    }

    // ✅ If still not found, try admin login
    $admin = DB::table('admin')
        ->where('email_address', $request->email)
        ->first();

    if ($admin && $admin->password === $request->password) {
        session(['user' => $admin, 'role' => 'admin']);
        return redirect()->route('admin_dashboard');
    }

    // ❌ Invalid credentials
    return back()->with('error', 'Invalid email or password.');
}






        // Admin dashboard
           public function admin_dashboard()
        {
            
            
         $user = session('user');

        // Pass user data to the view
        

        // If the session does not contain user data, redirect back to login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
            
            
            // Ensure session data exists before using it
            $userData = session()->get('user', null);
            $role = session()->get('role', null);
        
            // Pass the data to the view
            return view('admin_dashboard', compact('userData', 'role'));
        }
        
        
        // forget function
        
        
        public function forgotPassword(Request $request)
        {
            $request->validate([
                'email' => 'required|email'
            ]);
        
            // Check if email exists in business_registrations table
            $user = BusinessRegistration::where('Email', $request->email)->first();
        
            if (!$user) {
                return back()->with('error', 'This email is not registered.');
            }
        
            // Generate a new random password
            $newPassword = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        
            // Update new password in database
            $user->Password = Hash::make($newPassword);
            $user->save();
        
            // Send email to user with new password
            Mail::raw("Your password has been reset. Your new password is: $newPassword \n\nLogin here: " . url('/login'), function ($message) use ($user) {
                $message->to($user->Email)
                        ->subject('Password Reset Notification');
            });
        
            return back()->with('success', 'A new password has been sent to your email.');
        }
        
        
        // end forget function
        
        
        
        
        
}