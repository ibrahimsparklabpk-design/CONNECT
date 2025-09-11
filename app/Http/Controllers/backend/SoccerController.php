<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Soccer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SoccerController extends Controller
{
  


   public function index(){
         return view('backend.soccer.index');
   }

public function store(Request $request)
{

    $validator = Validator::make($request->all(), [
        // Basic Kit
        'fit_type' => ['required', 'in:men,women,youth'],
        'kit_type' => ['required', 'in:full,shirt,both'],
        'collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],
        'team_logo' => ['required', 'in:sublimated,embroidery'],
        'outfield_players_socks' => ['required', 'in:yes,no'],
        'inside_shirt_collar' => ['required', 'in:yes,no'],

        // Player Info
        'name' => ['required', 'string', 'max:255'],
        'number' => ['required', 'integer'],
        'shirt_size' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
        'sleeves_length' => ['required', 'in:short,long'],
        'quantity' => ['required', 'integer', 'min:1'],

        // Goalkeeper Requirements
        'goalkeeper_kit' => ['required', 'in:yes,no'],
        'goalkeeper_jersey_design' => ['required', 'in:same_as_player_uniform,custom_design'],
        'goalkeeper_sleeves' => ['required', 'in:long,short,padded_elbows'],
        'jersey_color' => ['required', 'in:same_as_top,same_as_pants,red,blue,black,white,other'],

        // Staff Requirements
        'staff_other' => ['required', 'in:yes,no'],
        'staff_fit_type' => ['required', 'in:men,women'],
        'staff_kit_type' => ['required', 'in:full,shirt'],
        'staff_collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],
        'staff_sleeves_length' => ['required', 'in:short,long,both'],

        // Staff Size Guide
        'guide_name' => ['required', 'string', 'max:255'],
        'guide_number' => ['required', 'integer'],
        'guide_shirt_size' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
        'guide_pant_size' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
        'guide_sleeves_length' => ['required', 'in:short,long'],
        'guide_quantity' => ['required', 'integer', 'min:1'],
    ]);

 
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator) 
            ->withInput(); 
    }


    $soccer = new Soccer();

//  Basic Kit
$soccer->fit_type = $request->fit_type;
$soccer->kit_type = $request->kit_type;
$soccer->collar_type = $request->collar_type;
$soccer->team_logo = $request->team_logo;
$soccer->outfield_players_socks = $request->outfield_players_socks;
$soccer->inside_shirt_collar = $request->inside_shirt_collar;

//  Player Info
$soccer->name = $request->name;
$soccer->number = $request->number;
$soccer->shirt_size = $request->shirt_size;
$soccer->sleeves_length = $request->sleeves_length;
$soccer->quantity = $request->quantity;

//  Goalkeeper Requirements
$soccer->goalkeeper_kit = $request->goalkeeper_kit;
$soccer->goalkeeper_jersey_design = $request->goalkeeper_jersey_design;
$soccer->goalkeeper_sleeves = $request->goalkeeper_sleeves;
$soccer->jersey_color = $request->jersey_color;

//  Staff Requirements
$soccer->staff_other = $request->staff_other;
$soccer->staff_fit_type = $request->staff_fit_type;
$soccer->staff_kit_type = $request->staff_kit_type;
$soccer->staff_collar_type = $request->staff_collar_type;
$soccer->staff_sleeves_length = $request->staff_sleeves_length;

//  Staff Size Guide
$soccer->guide_name = $request->guide_name;
$soccer->guide_number = $request->guide_number;
$soccer->guide_shirt_size = $request->guide_shirt_size;
$soccer->guide_pant_size = $request->guide_pant_size;
$soccer->guide_sleeves_length = $request->guide_sleeves_length;
$soccer->guide_quantity = $request->guide_quantity;

//  Save record
$soccer->save();


    return redirect()
        ->route('soccer.index') 
        ->with('success', 'Soccer record created successfully!');
}


   
}


