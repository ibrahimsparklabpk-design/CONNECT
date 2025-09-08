<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_table extends Model
{
    use HasFactory;
    protected $table="register_table";
    protected $primarykey="id";
}