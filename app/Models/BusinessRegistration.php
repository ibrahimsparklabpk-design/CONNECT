<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessRegistration extends Model
{
    use HasFactory;
    protected $table = 'business_registrations';
    protected $fillable = [
        'BusinessName',
        'Industry',
        'Email',
        'PhoneNumber',
        'Education',
        'Experience',
        'Website',
        'Country',
        'State',
        'City',
        'StreetName',
        'BuildingNumber',
        'GoodsServices',
        'profile_picture',
        'Password',
    ];
}
