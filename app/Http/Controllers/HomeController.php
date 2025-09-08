<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directory_table;

class HomeController extends Controller
{
    //

    // public function directorydd()
    // {
    //     return view("index");
    // }

    public function index()
    {

        return view('index');
    }
    public function services()
    {

        return view('services');
    }
    public function help(){
        
        return view('help');
    }
    
     public function FAQS(){
        
        return view('faqs');
    }
    


    public function register()
    {
        return view("register");
    }

    public function login()
    {
        return view("login");
    }
    
     public function forgetPassword()
    {
        return view("forgot-password");
    }
    // public function admin_dashboard(){
    //     return view("admin_dashboard");
    // }
    //public function edit_account(){
    //  return view("edit-account");

    //

    // If the session does not contain user data, redirect back to login
    //if (!$user) {
    // return redirect()->route('login')->with('error', 'Please log in first.');
    //}

    // Pass the user data to the dashboard view
    //return view('edit-account', compact('user'));
    //return view("edit-account");

    // Fetch the logged-in user's data from the session
    //  $user = session('user');

    //  // Pass user data to the view
    //  return view('edit-account', ['user' => $user]);

    // }

    // public function directoryadd()
    // {

    //     $userDirectory = Directory_table::orderBy('created_at', 'desc')->take(5)->get();

      
    //     $results = collect(); 

      
    //     return view('directoryadd', compact('userDirectory', 'results'));
        
    // }
    
    
    
    
    
    public function directoryadd()
{
    // Fetch directories with pagination (10 records per page)
    $userDirectory = Directory_table::orderBy('created_at', 'desc')->paginate(10);

    // No need to initialize $results separately
    return view('directoryadd', compact('userDirectory'));
}
    
    
    
    
    
    
    

    // Customizable Uniform 
    public function basketball()
    {
        return view('basketball');
    }
    public function cricket()
    {
        return view('cricket');
    }
    public function soccer()
    {
        return view('soccer');
    }
    public function shop()
    {
        return view('shop');
    }

    public function singleProduct()
    {
        return view('Single_Product');
    }

    // Updata dirctory
    public function update_directory()
    {



        return view('update_directory');
    }


    public function ContactUs()
    {



        return view('contactUs');
    }
}