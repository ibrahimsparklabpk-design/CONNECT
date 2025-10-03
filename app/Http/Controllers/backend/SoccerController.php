<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Soccer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sdk\Player;
use Illuminate\Support\Facades\Validator;

class SoccerController extends Controller
{

    public function view()
    {
        // Cookie se cart nikaal lo (agar cookie empty ho to [] return karega)
        $soccer = json_decode(request()->cookie('soccer_cart', '[]'), true);
        //   $soccer =  Soccer::orderBy('id')->get();
        //   dd($soccer);
        return view('backend.static.view', ['soccer' => $soccer]);
    }



    public function soccer()
    {
        $players = Player::all();
        return view('backend.static.soccer', compact('players'));
    }

    public function circket()
    {
        return view('backend.static.circket');
    }

    public function store(Request $request)
    {
          dd($request->all());
        $validator = Validator::make($request->all(), [

            'fit_type' => ['required', 'in:men,women,youth'],
            'kit_type' => ['required', 'in:full,shirt,both'],
            'collar_type' => 'required|in:v-neck,round-neck,polo-style',
            'team_logo' => 'required|in:sublimated,embroidery',
            'outfield_players_socks' => ['required', 'in:yes,no'],
            'inside_shirt_collar' => 'required|in:yes,no',
            'padded' => 'nullable|in:yes,no',
            'sleeves_length' => 'required|in:short,long,mix',
            'goalkeeper_kit' => ['required', 'in:yes,no'],
            'goalkeeper_jersey_design' => ['required', 'in:same_as_player_uniform,custom_design'],
            'goalkeeper_sleeves' => ['required', 'in:long,short,padded_elbows'],
            'jersey_color' => ['required', 'in:same_as_top,same_as_pants,red,blue,black,white,other'],

            'staff_other' => ['required', 'in:yes,no'],
            'staff_fit_type' => ['required', 'in:men,women'],
            'staff_kit_type' => ['required', 'in:full,shirt'],
            'staff_collar_type' => 'required|in:v-neck,round-neck,polo-style',


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


    

        $soccer = new Soccer();
        $soccer->sleeves_length = $request->sleeves_length;
        $soccer->fit_type       = $request->fit_type;
        $soccer->kit_type       = $request->kit_type;
        $soccer->collar_type    = $request->collar_type;
        $soccer->team_logo      = $request->team_logo;
        $soccer->outfield_players_socks = $request->outfield_players_socks;
        $soccer->inside_shirt_collar    = $request->inside_shirt_collar;

        // Goalkeeper, staff, guide info

        $soccer->goalkeeper_kit         = $request->goalkeeper_kit;
        $soccer->goalkeeper_jersey_design = $request->goalkeeper_jersey_design;
        $soccer->goalkeeper_sleeves     = $request->goalkeeper_sleeves;
        $soccer->jersey_color            = $request->jersey_color;

        $soccer->staff_other             = $request->staff_other;
        $soccer->staff_fit_type          = $request->staff_fit_type;
        $soccer->staff_kit_type          = $request->staff_kit_type;
        $soccer->staff_collar_type       = $request->staff_collar_type;
        $soccer->staff_sleeves_length    = $request->staff_sleeves_length;

        $soccer->guide_name              = $request->guide_name;
        $soccer->guide_number            = $request->guide_number;
        $soccer->guide_shirt_size        = $request->guide_shirt_size;
        $soccer->guide_pant_size         = $request->guide_pant_size;
        $soccer->guide_sleeves_length    = $request->guide_sleeves_length;
        $soccer->guide_quantity          = $request->guide_quantity;
        // $soccer->bulk_data  = $bulkData;


        if ($request->filled('selected_shirt')) {
            // Folder jahan images save hongi
            $destination = public_path('selected-shirts');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $originalPath = public_path(str_replace(url('/'), '', $request->selected_shirt));
            $filename = time() . '_' . basename($originalPath);

            copy($originalPath, $destination . '/' . $filename);

            $soccer->image = 'selected-shirts/' . $filename;
        } else {
            return redirect()->back()
                ->withErrors(['selected_shirt' => 'Please select a shirt before submitting.'])
                ->withInput();
        }

        $soccer->save();


         // **Players save karna relation ke through**
    $names = $request->input('name', []);
    $numbers = $request->input('number', []);
    $shirt_sizes = $request->input('shirt_size', []);
    $short_sizes = $request->input('short_size', []);
    $quantities = $request->input('quantity', []);

    foreach ($names as $index => $name) {
        if ($name) { // Empty row check
            $soccer->players()->create([
                'name'        => $name,
                'number'      => $numbers[$index] ?? null,
                'shirt_size'  => $shirt_sizes[$index] ?? null,
                'short_size'  => $short_sizes[$index] ?? null,
                'quantity'    => $quantities[$index] ?? 1,
            ]);
        }
    }
        return redirect()->route('static.view')->with('success', 'Record saved and added to session.');
    }

    public function removeFromCart(Request $request, $index)
    {
        // 🔹 Cookie se cart uthao (agar na mile to empty array)
        $cart = json_decode($request->cookie('soccer_cart', '[]'), true);

        if (isset($cart[$index])) {
            unset($cart[$index]); // sirf us index ka item delete hoga
            $cart = array_values($cart); // indexes reset karne ke liye
        }

        // 🔹 Cookie update karo
        return redirect()->back()
            ->with('success', 'Item removed successfully.')
            ->cookie('soccer_cart', json_encode($cart), 60 * 24 * 7);
        // 7 din ke liye cookie save (aap duration apne hisaab se change kar sakte ho)
    }


    public function clearCart()
    {
        // cart ko empty array bana do
        $cart = [];

        // cookie ko 0 minutes (ya negative) time dekar expire kara do
        $cookie = cookie('soccer_cart', json_encode($cart), -1);

        return redirect()->back()
            ->with('success', 'Cart cleared successfully.')
            ->withCookie($cookie);
    }
}