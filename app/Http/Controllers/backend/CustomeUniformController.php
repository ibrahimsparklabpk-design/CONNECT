<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomeUniformController extends Controller
{
    public function index(){
        return view('backend.custome.index');
    }
}
