<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'review_title' => 'required|string|max:255',
            'review_description' => 'required|string',
            'date_of_experience' => 'required|date',
            'review_stars' => 'required|integer|min:1|max:5',
            // 'directory_id' => 'required|exists:directories,id', // Ensure directory exists
        ]);

        // Save the comment
        Comment::create([
            'reviewer_name' => $request->input('reviewer_name'),
            'review_title' => $request->input('review_title'),
            'review_description' => $request->input('review_description'),
            'date_of_experience' => $request->input('date_of_experience'),
            'review_stars' => $request->input('review_stars'),
            'directory_id' => $request->input('directory_id'), // Store directory ID
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
