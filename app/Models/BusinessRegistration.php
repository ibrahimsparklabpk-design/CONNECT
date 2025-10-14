<?php

namespace App\Models;

use App\Models\sdk\CustomUniform;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Instead of Model
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessRegistration extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = ['Password']; // hide password when serialized

    /**
     * Tell Laravel which column is used for the password
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function customUniforms()
    {
        return $this->hasMany(CustomUniform::class, 'business_registrations_id');
    }
}