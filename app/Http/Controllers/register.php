<?php

namespace App\Http\Controllers;

use App\Models\BusinessRegistration;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Models\Register_table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class register extends Controller
{
    // public function store(Request $request){

    //     $emailExists = Register_table::where('email_address', $request->input('email_address'))->exists();

    //     if ($emailExists) {

    //         return redirect()->back()->with('error', 'This email is already registered.');
    //     }
    //      $data =new Register_table;
    //      $data->email_address = $request ['email_address'];
    //      $data->password = $request ['password'];

    //      $data->save();


    //      return redirect()->route('login')->with('success', 'Registration successful. Please log in.');




    // }

    public function store(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'reg_business_name' => 'required|string|max:255',

            // 'reg_email' => 'required|email|unique:business_registrations,email',
            'reg_email' => 'required|email',
            'reg_education' => 'required|string',
            // 'reg_website' => 'nullable|url',
            'reg_website' => 'nullable|string',
            'reg_state' => 'required|string',
            'reg_street_name' => 'nullable|string',
            'reg_industry' => 'required|string',
            'reg_phone' => 'required|string',
            'reg_experience' => 'required|string',
            'reg_country' => 'required|string',
            'reg_city' => 'required|string',
            'reg_building_number' => 'required|string',
            'reg_goods_services' => 'required|string',

        ]);

        // Custom email existence check
        $existingBusiness = BusinessRegistration::where('Email', $request->reg_email)->first();
        if ($existingBusiness) {
            // If the email exists, redirect back with an error message
            return redirect()->back()->with('error', 'This email is already registered.');
        }
        // Generate a random password
        $password = Str::random(8);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                // Store new file and get path
                $profile_picture = $file->store('profile_pictures', 'public');
            }
        } else {
            $profile_picture = null; // If no image uploaded, keep null
        }


        // Save the registration data

        $businessRegistration = BusinessRegistration::create([
            'BusinessName' => $request->reg_business_name,
            'Industry' => $request->reg_industry,
            'Email' => $request->reg_email,
            'PhoneNumber' => $request->reg_phone,
            'Education' => $request->reg_education,

            'Experience' => $request->reg_experience,
            'Website' => $request->reg_website,
            'Country' => $request->reg_country,
            'State' => $request->reg_state,
            'City' => $request->reg_city,
            'StreetName' => $request->reg_street_name,
            'BuildingNumber' => $request->reg_building_number,
            'GoodsServices' => $request->reg_goods_services,
            'profile_picture' => $profile_picture,

            'Password' => Hash::make($password),
        ]);


        // Send the auto-generated password to the user's email
        // Mail::to($businessRegistration->Email)->send(new \App\Mail\WelcomeEmail($password, $businessRegistration->Email, $loginUrl));
        
        // Generate the login URL (Change 'login' to your actual route name)
    $loginUrl = route('login');

    // Send email with password, email, and login link
    Mail::to($businessRegistration->Email)->send(new \App\Mail\WelcomeEmail($password, $businessRegistration->Email, $loginUrl));

        return redirect()->back()->with('success', 'Your business has been successfully registered! Please check your email for credentials.');
    }
}
