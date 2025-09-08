<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_table extends Model
{
    use HasFactory;
    protected $table = "register_table";
    protected $primarykey = "id";


    protected $fillable = [
        'email_address',
        'password',
        'first_name',
        'last_name',
        'display_name',
        'two_factor_method',
        'two_factor_code',

        // Add other columns here if needed
    ];
}
