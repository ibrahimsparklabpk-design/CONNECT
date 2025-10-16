<?php

namespace App\Http\Controllers\backend\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\BusinessRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

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

    public function edit(Request $request)
    {
        $business = Auth::guard('business')->user();

        if (!$business) {
            abort(403, 'You are not authorized to perform this action.');
        }

        $businessRegistration = BusinessRegistration::findOrFail($business->id);

        return view('dashboard.directory.edit', compact('businessRegistration'));
    }
    public function update(Request $request)
    {
        $business = Auth::guard('business')->user();

        if (!$business) {
            abort(403, 'You are not authorized to perform this action.');
        }

        $businessRegistration = BusinessRegistration::find($business->id);

        if (!$businessRegistration) {
            abort(404, 'Business record not found.');
        }

        $validator = Validator::make($request->all(), [
            'BusinessName' => ['required', 'string', 'max:255'],
            'Industry' => ['required', 'string', 'max:255'],
            'PhoneNumber' => ['required'],
            'Education' => ['nullable', 'string', 'max:255'],
            'Experience' => ['nullable', 'string', 'max:255'],
            'Website' => ['nullable', 'string', 'max:255', 'url'],
            'Country' => ['required', 'string', 'max:255'],
            'State' => ['required', 'string', 'max:255'],
            'City' => ['required', 'string', 'max:255'],
            'StreetName' => ['required', 'string', 'max:255'],
            'BuildingNumber' => ['required', 'string', 'max:255'],
            'GoodsServices' => ['required', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $profile_picture = time() . '_profile_picture.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/vendor'), $profile_picture);

            if ($businessRegistration->profile_picture && file_exists(public_path('admin/vendor/' . $businessRegistration->profile_picture))) {
                unlink(public_path('admin/vendor/' . $businessRegistration->profile_picture));
            }

            $businessRegistration->profile_picture = $profile_picture;
        }

        $businessRegistration->BusinessName = $request->BusinessName;
        $businessRegistration->Industry = $request->Industry;
        $businessRegistration->PhoneNumber = $request->PhoneNumber;
        $businessRegistration->Education = $request->Education;
        $businessRegistration->Experience = $request->Experience;
        $businessRegistration->Website = $request->Website;
        $businessRegistration->Country = $request->Country;
        $businessRegistration->State = $request->State;
        $businessRegistration->City = $request->City;
        $businessRegistration->StreetName = $request->StreetName;
        $businessRegistration->BuildingNumber = $request->BuildingNumber;
        $businessRegistration->GoodsServices = $request->GoodsServices;

        $businessRegistration->save();

        return redirect()->back()->with('success', 'Your business profile has been updated successfully.');
    }


    public function showUpdatePasswordForm()
    {
        $business = Auth::guard('business')->user();

        if (!$business) {
            return redirect()->back()->with('error', 'You must be logged in to change password.');
        }
        return view('dashboard.auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $business = Auth::guard('business')->user();

        if (!$business) {
            return redirect()->back()->with('error', 'You must be logged in to change password.');
        }

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        if (!isset($business->password) || empty($business->password)) {
            Log::warning("Business account has empty password", ['business_id' => $business->id]);
            return redirect()->back()->withErrors(['current_password' => 'No password found for your account. Contact admin.']);
        }

        Log::debug('Password debug', [
            'business_id' => $business->id,
            'stored_password_preview' => substr($business->password, 0, 10) . '...',
            'input_preview' => strlen($request->current_password) > 0 ? substr($request->current_password, 0, 3) . '...' : '',
        ]);

        $currentInput = $request->current_password;
        $matches = Hash::check($currentInput, $business->password);

        Log::debug('Hash check result', ['business_id' => $business->id, 'matches' => $matches]);

        if (!$matches) {
            return redirect()->back()->withErrors([
                'current_password' => 'Current password is incorrect. (If you recently migrated users, their passwords might be unhashed.)'
            ]);
        }

        $business->password = Hash::make($request->password);
        $business->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}