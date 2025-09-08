<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomProductsSizeStaff extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'staff_name',
        'staff_sleeves_length',
        'staff_pants_length',
        'staff_shirt_size',
        'staff_pants_size',
        'staff_quantity',
    ];
}
