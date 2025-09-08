<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directory_table;
use App\Models\BusinessRegistration;

// Ensure your model's name is correct

use App\Exports\DirectoryExport;
use App\Imports\DirectoryImport1;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Illuminate\Support\Facades\Storage;


use PhpOffice\PhpSpreadsheet\IOFactory;










class DirectoryController extends Controller
{
    public function directory()
    {
        return view('directory');
    }

    //insert directory
    public function directory_store(Request $request)
    {

        $userId = session('user');


        if (!$userId) {
            // If there's no user in the session, redirect to login
            return redirect()->route('login')->with('error', 'You must be logged in to add a directory.');
        }

        //   Check if the user has already added a directory

        $userId = $userId->id;
        $existingDirectory = Directory_table::where('register_table_id', $userId)->first();


        if ($existingDirectory) {
            // If a directory already exists for this user, return a message
            return redirect()->route('directory')->with('error', 'You have already added a directory.');
        }

        // Handle file upload for profile picture
        $profile_picture = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                // Store file and get the path
                $profile_picture = $file->store('profile_pictures', 'public');
            }
        }

        // Create a new directory entry
        $data = new Directory_table;
        $data->register_table_id = $userId;
        $data->professional_or_business_name = $request->input('business_name');
        $data->email = $request->input('email');
        $data->cell_number = $request->input('cell_number');
        $data->building_number = $request->input('building_number');
        $data->industry = $request->input('industry');
        $data->website = $request->input('website');
        $data->education = $request->input('education');
        $data->experience = $request->input('experience');
        $data->country = $request->input('country');
        $data->state = $request->input('state');
        $data->city = $request->input('city');
        $data->street_address = $request->input('street_address');
        $data->goods_or_services_provided = $request->input('goods_services');

        // Save the profile picture filename if it exists
        $data->profile_picture = $profile_picture ? basename($profile_picture) : null;

        // Save the entry in the database
        $data->save();

        // Redirect to the directory page with a success message
        return redirect()->route('directory')->with('success', 'Directory inserted successfully.');
    }



    //show directory
    public function showAll()
    {
        // Fetch all records from the directory_table
        $directories = Directory_table::all();

        // Return a view and pass the fetched data
        return view('directory_show_all', compact('directories'));
    }


    //Search directory by categories
    // public function directory_search(Request $request)
    // {

    //     $country = $request->input('country');
    //     $state = $request->input('state');
    //     $industry = $request->input('industry');


    //     $query = Directory_table::query();

    //     if ($country) {
    //         $query->where('country', 'like', '%' . $country . '%');
    //     }

    //     if ($state) {
    //         $query->where('state', 'like', '%' .    $state . '%');
    //     }

    //     if ($industry) {
    //         $query->where('industry', 'like', '%' . $industry . '%');
    //     }


    //     $results = $query->get();


    //     return view('directoryadd', compact('results'));
    // }

    // display directory old function
    // public function directoryadd(Request $request)
    // {

    //     $filters = [
    //         'country' => $request->input('country'),
    //         'state' => $request->input('state'),
    //         'industry' => $request->input('industry'),
    //         'education' => $request->input('eduction'), // Corrected key name to 'education'
    //         'experience' => $request->input('experience')
    //     ];


    //     $query = Directory_table::query();



    //     foreach ($filters as $key => $value) {
    //         if (!empty($value)) {
    //             $query->where($key, 'like', '%' . $value . '%');
    //         }
    //     }


    //     $results = $query->get();


    //     if (!$request->has(array_keys(array_filter($filters)))) {
    //         $results = Directory_table::orderBy('created_at', 'desc')->take(7)->get();
    //     }


    //     $noDataMessage = null;
    //     if ($results->isEmpty()) {
    //         $noDataMessage = "Data Not Found or No Available Records!";
    //     }


    //     return view('directoryadd', compact('results', 'filters', 'noDataMessage'));
    // }

    public function directoryadd(Request $request)
    {

        $filters = [
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'industry' => $request->input('industry'),
            'education' => $request->input('education'), // Corrected key name
            'experience' => $request->input('experience')
        ];


        $query = BusinessRegistration::query();


        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }
        
        
        
        // sorting
        // Sorting Logic
            $sort = $request->input('sort');
            if ($sort == 'name_asc') {
                $query->orderBy('BusinessName', 'asc');
            } elseif ($sort == 'name_desc') {
                $query->orderBy('BusinessName', 'desc');
            } elseif ($sort == 'latest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort == 'oldest') {
                $query->orderBy('created_at', 'asc');
            }
        
        
        
        
        

        
                // $results = $query->get();
        //   $results = $query->orderBy('created_at', 'desc')->paginate(10);
        $results = $query->paginate(10);

        // if (!$request->has(array_keys(array_filter($filters)))) {
        //     $results = BusinessRegistration::orderBy('created_at', 'desc')->take(7)->get();
        // }


        $noDataMessage = null;
        if ($results->isEmpty()) {
            $noDataMessage = "Data Not Found or No Available Records!";
        }
        $search=null;


        return view('directoryadd', compact('results', 'filters', 'noDataMessage', 'search','sort'));
    }



    //search directory by text
    public function search_bytext(Request $request)
    {
        // Get the search input
        // $search = $request->input('search');
        $search = $request->input('search') ?? '';

        // Initialize an empty query

        // $query = Directory_table::query();
        $query =  BusinessRegistration::query();

        // If search input is provided, search across relevant fields
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                // Search across multiple fields in the directory_table
                $q->where('BusinessName', 'like', '%' . $search . '%')
                    ->orWhere('Country', 'like', '%' . $search . '%')
                    ->orWhere('State', 'like', '%' . $search . '%')
                    ->orWhere('City', 'like', '%' . $search . '%')
                    ->orWhere('Industry', 'like', '%' . $search . '%')
                    ->orWhere('Email', 'like', '%' . $search . '%')
                    ->orWhere('PhoneNumber', 'like', '%' . $search . '%')
                    ->orWhere('Experience', 'like', '%' . $search . '%')
                    ->orWhere('Website', 'like', '%' . $search . '%')
                    ->orWhere('Education', 'like', '%' . $search . '%')
                    ->orWhere('StreetName', 'like', '%' . $search . '%')
                    ->orWhere('BuildingNumber', 'like', '%' . $search . '%')
                    ->orWhere('GoodsServices', 'like', '%' . $search . '%');
            });

            // Get results based on the search input
            // $results = $query->get();
            $results = $query->paginate(10);
        } else {
            // If no search input is provided, return an empty collection
            $results = collect(); // Empty collection
        }

        $noDataMessage = null;
        // if ($results->isEmpty()) {
        //     $noDataMessage = "Data Not Found or No Available Records!";
        // }

        // Return the view with the search results
       return view('directoryadd', compact('results', 'noDataMessage', 'search'));
    }




    //Show Directories to admin (listing)
    public function Directotylisting()
    {


        // Fetch all records from the directory_table
        // $directories = Directory_table::all();
        $directories = BusinessRegistration::all();
        
         $userData = session()->get('user', null);
    $role = session()->get('role', null);


        // Return a view and pass the fetched data
        return view('admin_listing', compact('directories', 'userData', 'role'));
    }

    //Delect method of admin show directory
    public function delete($id)
    {
        // Find the record by its ID and delete it
        // $directory = Directory_table::find($id);
        $directory = BusinessRegistration::find($id);

        if ($directory) {  // Fix this variable name to match $directory
            $directory->delete();  // Delete the record
            return redirect()->route('admin_listing')->with('success', 'Directory entry deleted successfully.');
        } else {
            return redirect()->route('admin_listing')->with('error', 'Directory entry not found.');
        }
    }


    // download directory xlsx format


    public function downloadxlsx()
    {


        return Excel::download(new DirectoryExport, 'directory_data.xlsx');
    }

    // New upload method
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new DirectoryImport1, $request->file('file'));

        return back()->with('success', 'Data imported successfully!');
    }





    // display directory to user 

    // public function showUserDirectoryData()
    // {

    //     $userId = session('user');


    //     $userId = $userId->id;
    //     $userDirectoryData = Directory_table::where('register_table_id', $userId)->first();


    //     if (!$userDirectoryData) {
    //         return redirect()->back()->with('error', 'No directory data found for this user.');
    //     }


    //     return view('update_directory', compact('userDirectoryData'));
    // }




    public function showUserDirectoryData()
    {

        $userId = session('user');


        $userId = $userId->id;
        $userDirectoryData = BusinessRegistration::where('id', $userId)->first();


        if (!$userDirectoryData) {
            return redirect()->back()->with('error', 'No directory data found for this user.');
        }


        return view('update_directory', compact('userDirectoryData'));
    }


    // Update directory
    public function updateUserDirectoryData(Request $request)
    {

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480',

        ]);

        // Step 2: Get the logged-in user's ID from the session
        $userId = session('user')->id;

        // Step 3: Fetch the user's record
        $userDirectoryData = BusinessRegistration::where('id', $userId)->first();

        if (!$userDirectoryData) {
            return redirect()->back()->with('error', 'No directory data found for this user.');
        }
        // Handle file upload
        $profile_picture = $userDirectoryData->profile_picture; // Default: existing logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            if ($file->isValid()) {
                // Delete old file if it exists
                if ($profile_picture && Storage::disk('public')->exists($profile_picture)) {
                    Storage::disk('public')->delete($profile_picture);
                }
                // Store new file and get path
                $profile_picture = $file->store('profile_pictures', 'public');
            }
        }

        // Step 4: Update the data
        $userDirectoryData->update([
            // 'BusinessName' => $request->input('business_name'),
            // 'Industry' => $request->input('industry'),

            // 'Email' => $request->input('email'),
            // 'PhoneNumber' => $request->input('cell_number'),
            // 'Education' => $request->input('education'),
            // 'Experience'=> $request->input('experience'),
            // 'Website' => $request->input('website'),
            // 'Country' => $request->input('country'),
            // 'State' => $request->input('state'),
            // 'City' => $request->input('city'),
            // 'StreetName' => $request->input('street_address'),
            // 'BuildingNumber' => $request->input('building_number'),
            // 'GoodsServices' => $request->input('goods_services'),
            'profile_picture' => $profile_picture, // Save image path

        ]);

        // Step 5: Redirect with success message
        return redirect()->back()->with('success', 'Directory data updated successfully.');
    }
}
