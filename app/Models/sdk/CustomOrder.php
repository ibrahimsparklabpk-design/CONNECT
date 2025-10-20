<?php

namespace App\Models\sdk;

use App\Models\BusinessRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomOrder extends Model
{
    use HasFactory;

     protected $guarded = [];

     public function businessRegistration()
    {
        return $this->belongsTo(BusinessRegistration::class, 'business_registrations_id');
    }

    public function customUniforms()
{
    return $this->hasMany(CustomUniform::class, 'business_registrations_id', 'business_registrations_id');
}

}