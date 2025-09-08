<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory_table extends Model
{
    use HasFactory;
    protected $table = "directory_table";
    protected $primarykey = "id";
    protected $fillable = [
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
        'profile_picture',
    ];
}
