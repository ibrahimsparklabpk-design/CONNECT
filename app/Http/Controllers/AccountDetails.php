<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountDetails extends Controller
{
    public function edit_account(Request $request)
    {
        // Retrieve user from the session
        $user = $request->session()->get('user');
        // dd($user);

        // If session is missing, redirect back to login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        // Pass user data to the view
        return view('edit-account', compact('user'));
    }
    // old
    // public function updateAccount(Request $request)
    // {

    //     $user = $request->session()->get('user');

    //     if (!$user) {
    //         return back()->with('error', 'User not found.');
    //     }


    //     if ($user->password !== $request->current_password) {
    //         return back()->with('error', 'Current password is incorrect.');
    //     }


    //     $updateData = [
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'display_name' => $request->display_name,
    //     ];


    //     if ($request->new_password) {
    //         $updateData['password'] = $request->new_password;  
    //     }


    //     try {
    //         $updated = DB::table('register_table')
    //             ->where('email_address', $user->email_address)
    //             ->update($updateData);

    //         if ($updated) {

    //             $user = DB::table('register_table')->where('email_address', $user->email_address)->first();


    //             session(['user' => $user]);


    //             return redirect()->route('edit-account')->with(['success' => 'Account updated successfully.', 'user' => $user]);
    //         } else {
    //             return back()->with('error', 'No changes were made.');
    //         }
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Failed to update account. Please try again.');
    //     }
    // }


    // new

    public function updateAccount(Request $request)
    {
        // Step 1: Validate the input
        $request->validate(
            [
                'current_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_new_password' => 'required|same:new_password',
            ],
            [
                'confirm_new_password.same' => 'Confirm Password does not match with New Password.',
                'new_password.min' => 'New Password must be at least 6 characters long.',
                'current_password.required' => 'Current Password is required.',
            ]
        );

        // Step 2: Get logged-in user from the session
        $user = $request->session()->get('user');

        // Step 3: Retrieve the user's record from the database
        $record = DB::table('business_registrations')->where('id', $user->id)->first();

        // Step 4: Check if the current password matches the database password
        if (!Hash::check($request->current_password, $record->Password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        // Step 5: Update the password in the database
        DB::table('business_registrations')->where('id', $user->id)->update([
            'Password' => Hash::make($request->new_password), // Hashing the new password for security
        ]);

        // Step 6: Return success message
        return back()->with('success', 'Password updated successfully.');
    }
}