<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DirectoryController extends Controller
{
    public function create()
    {
        return view('directory');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'professional_or_business_name'=>['required', 'string','max:255'],
            'email'=>['required', 'string','max:255'],
            'professional_or_business_name'=>['required', 'string','email'],
            'cell_number'=>['required', 'string'],
            'work_number'=>['required', 'string'],
            'industry'=>['required', 'string','max:255'],
            'website'=>['required', 'string','max:255'],
            'education'=>['required', 'string','max:255'],
            'experience'=>['required', 'string','max:255'],
            'professional_or_business_name'=>['required', 'string','max:255'],
            'professional_or_business_name'=>['required', 'string','max:255'],
        ]);
    }

    public function show()
    {
        return view('directory');
    }
}