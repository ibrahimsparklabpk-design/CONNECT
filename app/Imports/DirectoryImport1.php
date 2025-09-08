<?php

namespace App\Imports;

use App\Models\Directory_table;
use App\Models\BusinessRegistration;
use Maatwebsite\Excel\Concerns\ToModel;


use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class DirectoryImport1 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Directory_table([
            'register_table_id' => $row['register_table_id'], // use the header name here
            'professional_or_business_name' => $row['professional_or_business_name'],
            'email' => $row['email'],
            'cell_number' => $row['cell_number'],
            'building_number' => $row['building_number'],
            'industry' => $row['industry'],
            'website' => $row['website'],
            'education' => $row['education'],
            'experience' => $row['experience'],
            'country' => $row['country'],
            'state' => $row['state'],
            'city' => $row['city'],
            'street_address' => $row['street_address'],
            'goods_or_services_provided' => $row['goods_or_services_provided'],
            'profile_picture' => $row['profile_picture'],
        ]);
    }







    // public function model(array $row)
    // {
    //     return new BusinessRegistration([

    //         'BusinessName' => $row['Title'], // use the header name here
    //         'Industry' => $row['Industry'],
    //         'Email' => $row['E-mail'],
    //         'PhoneNumber' => $row['Cell Number'],
    //         'Education' => $row['industry'],
    //         'website' => $row['website'],
    //         'Website' => $row['education'],
    //         'Experience' => $row['experience'],
    //         'Website' => $row['country'],
    //         'Country' => $row['state'],
    //         'State' => $row['city'],
    //         'City' => $row['street_address'],
    //         'StreetName' => $row['goods_or_services_provided'],
    //         'BuildingNumber' => $row['profile_picture'],
    //         'GoodsServices' => $row['profile_picture'],
    //         'profile_picture' => $row['profile_picture'],
    //         'Password' => $row['profile_picture'],
    //     ]);
    // }


    // public function model(array $row)
    // {
    //     // Debugging: print the row keys
    //     Log::info($row); // Uncomment to log the keys if needed

    //     return new Directory_table([
    //         'register_table_id' => null, // You can set a default value here if needed
    //         'professional_or_business_name' => $row['Title'], // 'Title' from the Excel file
    //         'email' => $row['E-mail'], // 'E-mail' from the Excel file
    //         'cell_number' => $row['Cell Number'], // 'Cell Number' from the Excel file
    //         'building_number' => null, // Leave empty
    //         'industry' => $row['Industry'], // 'Industry' from the Excel file
    //         'website' => null, // Leave empty
    //         'education' => null, // Leave empty
    //         'experience' => null, // Leave empty
    //         'country' => null, // Leave empty
    //         'state' => null, // Leave empty
    //         'city' => null, // Leave empty
    //         'street_address' => null, // Leave empty
    //         'goods_or_services_provided' => null, // Leave empty
    //         'profile_picture' => null, // Leave empty
    //         'created_at' => now(), // Set current time for created_at
    //         'updated_at' => now(), // Set current time for updated_at
    //     ]);
    // }
}
