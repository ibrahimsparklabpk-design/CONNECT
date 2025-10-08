<?php

namespace App\Models\sdk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soccer extends Model
{
    use HasFactory;

    protected $guarded = [];


//     public function players() {
//     return $this->hasMany(Player::class);
// }
    protected $casts = [
    'bulk_data' => 'array',
];
}