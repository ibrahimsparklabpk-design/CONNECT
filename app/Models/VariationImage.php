<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'variation_id',
        'image',
    ];

    // Relationship with Variation model
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
