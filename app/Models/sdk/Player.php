<?php

namespace App\Models\sdk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function soccer()
    {
        return $this->belongsTo(Soccer::class);
    }
}