<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Soccer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SoccerController extends Controller
{

    public function view()
    {
        $soccer = session('soccer_cart', []);
        session(['soccer' => $soccer]);


        return view('backend.static.view', ['soccer' => session('soccer')]);

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

            'price' => ['required', 'numeric', 'min:0'],
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // $guidPrice = $request->guide_price;
        // $guideQuantity = $request->guide_quantity;
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
        // $soccer->guide_price = $guideQuantity * $guidPrice;

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



        if ($request->filled('selected_shirt')) {
            // Folder jahan images save hongi
            $destination = public_path('selected-shirts');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            // Base64 image string nikaalo
            $imageData = $request->selected_shirt;

            // Agar "data:image/png;base64," shuruat me ho to use hatao
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);

            // Unique file name
            $filename = time() . '_shirt.png';

            // File save karo
            file_put_contents($destination . '/' . $filename, base64_decode($imageData));

            // Database me sirf relative path save karo
            $customeUniform->image = 'selected-shirts/' . $filename;
            $customeUniform->save();

            return redirect()->back()->with('success', 'Shirt saved successfully!');
        } else {
            return redirect()->back()
                ->withErrors(['selected_shirt' => 'Please select a shirt before submitting.'])
                ->withInput();
        }

        // logo upload file

       if ($request->filled('uploaded_logo')) {
    $destination = public_path('custom/user-logos');
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }

    $imageData = $request->uploaded_logo;
    $imageData = preg_replace('#^data:image/\w+;base64,#i', '', $imageData);

    $filename = time() . '_logo.png';
    file_put_contents($destination . '/' . $filename, base64_decode($imageData));

    $customeUniform->logo = 'custom/user-logos/' . $filename;
    $customeUniform->save();
}
        //  Save record
        $soccer->save();


        return redirect()
            ->route('static.index')
            ->with('success', 'Soccer record created successfully!');
    }


    public function soccer()
    {
        return view('backend.static.soccer');
    }

    public function circket()
    {
        return view('backend.static.circket');
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
       
          // 'price' => ['required', 'numeric', 'min:0'],
    ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // $guidPrice = $request->guide_price;
        // $guideQuantity = $request->guide_quantity;
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
        // $soccer->guide_price = $guideQuantity * $guidPrice;

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


        if ($request->filled('selected_shirt')) {
            // Folder jahan images save hongi
            $destination = public_path('selected-shirts');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true); // folder agar na ho to bana do
            }

            // Original image ka path
            $originalPath = public_path(str_replace(url('/'), '', $request->selected_shirt));
            $filename = time() . '_' . basename($originalPath);

            // Image copy kar do new folder me
            copy($originalPath, $destination . '/' . $filename);

            // Database me path save karo
            $soccer->image = 'selected-shirts/' . $filename;

            $soccer->save();

            return redirect()->back()->with('success', 'Shirt saved successfully!');
        } else {
            return redirect()->back()
                ->withErrors(['selected_shirt' => 'Please select a shirt before submitting.'])
                ->withInput();
        }

        //  Save record
        $soccer->save();
        $item = [
            'fit_type' => $soccer->fit_type,
            'kit_type' => $soccer->kit_type,
            'collar_type' => $soccer->collar_type,
            'team_logo' => $soccer->team_logo,
            'outfield_players_socks' => $soccer->outfield_players_socks,
            'inside_shirt_collar' => $soccer->inside_shirt_collar,
            'name' => $soccer->name,
            'number' => $soccer->number,
            'shirt_size' => $soccer->shirt_size,
            'sleeves_length' => $soccer->sleeves_length,
            'quantity' => $soccer->quantity,
            'goalkeeper_kit' => $soccer->goalkeeper_kit,
            'goalkeeper_jersey_design' => $soccer->goalkeeper_jersey_design,
            'goalkeeper_sleeves' => $soccer->goalkeeper_sleeves,
            'jersey_color' => $soccer->jersey_color,
            'staff_other' => $soccer->staff_other,
            'staff_fit_type' => $soccer->staff_fit_type,
            'staff_kit_type' => $soccer->staff_kit_type,
            'staff_collar_type' => $soccer->staff_collar_type,
            'staff_sleeves_length' => $soccer->staff_sleeves_length,
            'guide_name' => $soccer->guide_name,
            'guide_number' => $soccer->guide_number,
            'guide_shirt_size' => $soccer->guide_shirt_size,
            'guide_pant_size' => $soccer->guide_pant_size,
            'guide_sleeves_length' => $soccer->guide_sleeves_length,
            'guide_quantity' => $soccer->guide_quantity,
            'image' => $soccer->image ?? null,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];

        $cart = session()->get('soccer_cart', []);
        $cart[] = $item;
        session(['soccer_cart' => $cart]);

        // ✅ Redirect to view method
        return redirect()->route('soccer.view')->with('success', 'Record saved and added to session.');

        return redirect()
            ->route('static.index')
            ->with('success', 'Soccer record created successfully!');
    }

    public function clearCart()
    {
        session()->forget('custom_uniform_cart');
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }

    public function remove($index)
    {
        $cart = session()->get('custom_uniform_cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('custom_uniform_cart', array_values($cart)); // Reindex array
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}