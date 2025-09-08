<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $emailData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'userMessage' => $request->message, // Renamed to avoid conflict
        ];

        Mail::send('contact', $emailData, function ($message) use ($request) {
            $message->to('rizwan.sparklab@gmail.com')
                ->subject('New Contact Form Submission')
                ->from($request->email);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}