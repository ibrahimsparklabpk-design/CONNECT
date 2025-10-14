<?php

namespace App\Models\sdk;

use App\Models\BusinessRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomUniform extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'bulk_data' => 'array',
        'guide_bulk_data' => 'array',
    ];

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function businessRegistration()
    {
        return $this->belongsTo(BusinessRegistration::class, 'business_registrations_id');
    }
}