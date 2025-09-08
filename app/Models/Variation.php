<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color',
        'size',
        'stock_quantity',
    ];

    // Relationship with Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with VariationImage model
    public function images()
    {
        return $this->hasMany(VariationImage::class);
    }
}
