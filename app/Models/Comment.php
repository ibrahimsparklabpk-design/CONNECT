<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'reviewer_name',
        'review_title',
        'review_description',
        'date_of_experience',
        'review_stars',
        'directory_id'
    ];

     // Relationship to the Directory model
     public function directory()
     {
         return $this->belongsTo(Directory::class);
     }
}
