<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', // Add this line
        'sleeve_length',
        'team_logo',
        'collar_type',
        'kit',
        'fit_type',
        'inside_collar_message',
        'socks',
        'collar_text',
        'socks_color',
        'goalkeeper_kit',
        'padded',
        'goalkeeper_sleeve',
        'goalkeeper_jersey_design',
        'jersey_color',
        'staff_other',
        'staff_kit',
        'staff_collar_type',
        'staff_fit_type',
        'custom_image',
    ];
}