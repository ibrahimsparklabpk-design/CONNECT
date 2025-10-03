<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Player;
use App\Models\sdk\Soccer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function create()
    {
        $soccers = Soccer::all(); 
         return view('backend.static.player', compact('soccers'));
    }

public function store(Request $request)
{

    
    $names = $request->input('name', []);
    $numbers = $request->input('number', []);
    $shirt_sizes = $request->input('shirt_size', []);
    $short_sizes = $request->input('short_size', []);
    $quantities = $request->input('quantity', []);

    foreach ($names as $index => $name) {
        Player::create([
            'soccer_id' => $request->soccer_id,
            'name' => $name,
            'number' => $numbers[$index] ?? null,
            'shirt_size' => $shirt_sizes[$index] ?? null,
            'short_size' => $short_sizes[$index] ?? null,
            'quantity' => $quantities[$index] ?? 1,
        ]);
    }

    return redirect()->back()->with('success', 'Players saved successfully.');
}
}