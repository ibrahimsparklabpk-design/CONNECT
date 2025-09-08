<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Directory_table;
use App\Models\Directory_table;
use App\Models\Comment;
use App\Models\BusinessRegistration;

class ReadMore extends Controller
{
    // old
    // public function readmore($id)
    // {




    //     $directory = Directory_table::findOrFail($id);
    //     $comments = Comment::where('directory_id', $directory->id)->get();


    //     // Total aur average rating calculate kar rahe hain
    //     $totalReviews = $comments->count();
    //     $averageRating = $totalReviews > 0 ? $comments->avg('review_stars') : 0; // Avg rating


       
    //     return view('readmore', compact('directory', 'comments', 'averageRating', 'totalReviews'));
       

    // }

    public function readmore($id)
    {




        $directory = BusinessRegistration::findOrFail($id);
        $comments = Comment::where('directory_id', $directory->id)->get();


        // Total aur average rating calculate kar rahe hain
        $totalReviews = $comments->count();
        $averageRating = $totalReviews > 0 ? $comments->avg('review_stars') : 0; // Avg rating


       
        return view('readmore', compact('directory', 'comments', 'averageRating', 'totalReviews'));
       

    }
}