<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    public $password;
    public $email; // Declare the email variable
 public $loginUrl;

    // Pass both password and email to the constructor
    public function __construct($password, $email, $loginUrl)
    {
        $this->password = $password;
        $this->email = $email;
        $this->loginUrl = $loginUrl;
    }

    public function build()
    {
        return $this->view('emails.welcome')
            ->with([
                'password' => $this->password,
                'email' => $this->email, // Pass the email to the view
                'loginUrl' => $this->loginUrl,
            ]);
    }
}
