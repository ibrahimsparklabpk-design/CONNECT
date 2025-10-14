<?php

namespace App\Http\Controllers\backend\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BusinessRegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'BusinessName' => ['required', 'string', 'max:255'],
            'Industry' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:business_registrations,email'],
            // 'Password' => ['required', 'string', 'min:8', 'max:255'],
            'PhoneNumber' => ['required'],
            'Education' => ['required', 'string', 'max:255'],
            'Experience' => ['required', 'string', 'max:255'],
            'Website' => ['required', 'string', 'max:255', 'url'],
            'Country' => ['required', 'string', 'max:255'],
            'State' => ['required', 'string', 'max:255'],
            'City' => ['required', 'string', 'max:255'],
            'StreetName' => ['required', 'string', 'max:255'],
            'BuildingNumber' => ['required', 'string', 'max:255'],
            'GoodsServices' => ['required', 'string', 'max:255'],
            'profile_picture' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $profile_picture = time() . '_profile_picture.' . $request->profile_picture->getClientOriginalExtension();
        $request->profile_picture->move(public_path('admin/vendor'), $profile_picture);

        $password = Str::random(8);
        $loginUrl = route('login');

        $businessRegistration = new BusinessRegistration();
        $businessRegistration->BusinessName =  $request->BusinessName;
        $businessRegistration->Industry =  $request->Industry;
        $businessRegistration->Email =  $request->Email;
        $businessRegistration->Password = bcrypt($password);
        $businessRegistration->PhoneNumber =  $request->PhoneNumber;
        $businessRegistration->Experience =  $request->Experience;
        $businessRegistration->Website =  $request->Website;
        $businessRegistration->Country =  $request->Country;
        $businessRegistration->State =  $request->State;
        $businessRegistration->City =  $request->City;
        $businessRegistration->StreetName =  $request->StreetName;
        $businessRegistration->BuildingNumber =  $request->BuildingNumber;
        $businessRegistration->GoodsServices =  $request->GoodsServices;
        $businessRegistration->profile_picture =  $profile_picture;
        $businessRegistration->save();

        Mail::to($businessRegistration->Email)
            ->send(new \App\Mail\WelcomeEmail($password, $businessRegistration->Email, $loginUrl));

        return redirect()->back()->with('success', 'Your business has been successfully registered! Please check your email for credentials.');
    }
}