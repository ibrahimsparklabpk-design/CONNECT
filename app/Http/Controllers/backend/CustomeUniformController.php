<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\sdk\CustomUniform;
use Illuminate\Http\Request;


class CustomeUniformController extends Controller
{
    public function view()
    {
        $customeUniform = CustomUniform::orderby('id')->get();
        session(['customeUniform' => $customeUniform]);

        return view('backend.custome.view', ['customeUniform' => session('customeUniform')]);
    }
    public function index()
    {
        return view('backend.custome.index');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'fit_type' => ['required', 'in:men,women,youth'],
            'kit_type' => ['required', 'in:full,shirt,both'],
            'collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],
            'team_logo' => ['required', 'in:sublimated,embroidery'],
            'outfield_players_socks' => ['required', 'in:yes,no'],
            'inside_shirt_collar' => ['required', 'in:yes,no'],

            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer'],
            'shirt_size' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
            'sleeves_length' => ['required', 'in:short,long'],
            'quantity' => ['required', 'integer', 'min:1'],

            'goalkeeper_kit' => ['required', 'in:yes,no'],
            'goalkeeper_jersey_design' => ['required', 'in:same_as_player_uniform,custom_design'],
            'goalkeeper_sleeves' => ['required', 'in:long,short,padded_elbows'],
            'jersey_color' => ['required', 'in:same_as_top,same_as_pants,red,blue,black,white,other'],

            'staff_other' => ['required', 'in:yes,no'],
            'staff_fit_type' => ['required', 'in:men,women'],
            'staff_kit_type' => ['required', 'in:full,shirt'],
            'staff_collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],
            'staff_sleeves_length' => ['required', 'in:short,long,both'],

            'guide_name' => ['required', 'string', 'max:255'],
            'guide_number' => ['required', 'integer'],
            'guide_shirt_size' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
            'guide_pant_size' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
            'guide_sleeves_length' => ['required', 'in:short,long'],
            'guide_quantity' => ['required', 'integer', 'min:1'],
            // 'price' => ['required', 'numeric', 'min:0'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $price = $request->price;
        // $quantity = $request->quantity;
        $customeUniform = new CustomUniform();

        $customeUniform->fit_type = $request->fit_type;
        $customeUniform->kit_type = $request->kit_type;
        $customeUniform->collar_type = $request->collar_type;
        $customeUniform->team_logo = $request->team_logo;
        $customeUniform->outfield_players_socks = $request->outfield_players_socks;
        $customeUniform->inside_shirt_collar = $request->inside_shirt_collar;

        $customeUniform->name = $request->name;
        $customeUniform->number = $request->number;
        $customeUniform->shirt_size = $request->shirt_size;
        $customeUniform->sleeves_length = $request->sleeves_length;
        $customeUniform->quantity = $request->quantity;
        // $customeUniform->price = $price * $quantity;

        $customeUniform->goalkeeper_kit = $request->goalkeeper_kit;
        $customeUniform->goalkeeper_jersey_design = $request->goalkeeper_jersey_design;
        $customeUniform->goalkeeper_sleeves = $request->goalkeeper_sleeves;
        $customeUniform->jersey_color = $request->jersey_color;

        $customeUniform->staff_other = $request->staff_other;
        $customeUniform->staff_fit_type = $request->staff_fit_type;
        $customeUniform->staff_kit_type = $request->staff_kit_type;
        $customeUniform->staff_collar_type = $request->staff_collar_type;
        $customeUniform->staff_sleeves_length = $request->staff_sleeves_length;

        $customeUniform->guide_name = $request->guide_name;
        $customeUniform->guide_number = $request->guide_number;
        $customeUniform->guide_shirt_size = $request->guide_shirt_size;
        $customeUniform->guide_pant_size = $request->guide_pant_size;
        $customeUniform->guide_sleeves_length = $request->guide_sleeves_length;
        $customeUniform->guide_quantity = $request->guide_quantity;

        $customeUniform->save();
        $cart = session()->get('custom_uniform_cart', []);

        $item = [
            'fit_type' => $customeUniform->fit_type,
            'kit_type' => $customeUniform->kit_type,
            'collar_type' => $customeUniform->collar_type,
            'team_logo' => $customeUniform->team_logo,
            'outfield_players_socks' => $customeUniform->outfield_players_socks,
            'inside_shirt_collar' => $customeUniform->inside_shirt_collar,

            'name' => $customeUniform->name,
            'number' => $customeUniform->number,
            'shirt_size' => $customeUniform->shirt_size,
            'sleeves_length' => $customeUniform->sleeves_length,
            'quantity' => $customeUniform->quantity,

            'goalkeeper_kit' => $customeUniform->goalkeeper_kit,
            'goalkeeper_jersey_design' => $customeUniform->goalkeeper_jersey_design,
            'goalkeeper_sleeves' => $customeUniform->goalkeeper_sleeves,
            'jersey_color' => $customeUniform->jersey_color,

            'staff_other' => $customeUniform->staff_other,
            'staff_fit_type' => $customeUniform->staff_fit_type,
            'staff_kit_type' => $customeUniform->staff_kit_type,
            'staff_collar_type' => $customeUniform->staff_collar_type,
            'staff_sleeves_length' => $customeUniform->staff_sleeves_length,

            'guide_name' => $customeUniform->guide_name,
            'guide_number' => $customeUniform->guide_number,
            'guide_shirt_size' => $customeUniform->guide_shirt_size,
            'guide_pant_size' => $customeUniform->guide_pant_size,
            'guide_sleeves_length' => $customeUniform->guide_sleeves_length,
            'guide_quantity' => $customeUniform->guide_quantity,
        ];

        $cart[] = $item;


        session(['custom_uniform_cart' => $cart]);

        return redirect()
            ->route('custome.index')
            ->with('success', 'Record created successfully');
    }
}