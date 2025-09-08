<?php

namespace App\Exports;

use App\Models\Directory_table;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DirectoryExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Directory_table::all();
        return Directory_table::select(
            'register_table_id',
            'professional_or_business_name',
            'email',
            'cell_number',
            'building_number',
            'industry',
            'website',
            'education',
            'experience',
            'country',
            'state',
            'city',
            'street_address',
            'goods_or_services_provided',
            'profile_picture'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Register Table ID',
            'Professional or Business Name',
            'Email',
            'Cell Number',
            'Building Number',
            'Industry',
            'Website',
            'Education',
            'Experience',
            'Country',
            'State',
            'City',
            'Street Address',
            'Goods or Services Provided',
            'Profile Picture',
        ];
    }
}
