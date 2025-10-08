<?php

namespace App\Models\sdk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}