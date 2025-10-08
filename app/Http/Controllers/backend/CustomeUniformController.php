<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\sdk\CustomUniform;
use Illuminate\Http\Request;


class CustomeUniformController extends Controller
{

    public function soccer()
    {
        
        $customImage = CustomUniform::orderBy('id')->get();
        
        return view('backend.custome.soccer', compact('customImage'));
    }

    public function circket()
    {
        return view('backend.custome.circket');
    }



    public function view()
    {
        // $data = CustomUniform::all();
        // dd($data);
        $cart = session()->get('custom_uniform_cart', []);
        $grandTotal = array_sum(array_column($cart, 'total'));

        // Session me grand total save
        session()->put('custom_uniform_total', $grandTotal);

        return view('backend.custome.view', compact('cart', 'grandTotal'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // ================= BASIC FIELDS =================
            'fit_type' => ['required', 'in:men,women,youth'],
            'kit_type' => ['required', 'in:full,shirt,both'],
            'collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],
            'team_logo' => ['required', 'in:sublimated,embroidery'],
            'outfield_players_socks' => ['required', 'in:yes,no'],
            'inside_shirt_collar' => ['required', 'in:yes,no'],
            // 'padded' => ['nullable', 'in:yes,no'],

            // ================= MULTIPLE PLAYERS =================
            'name' => ['required', 'array'],
            'name.*' => ['required', 'string', 'max:255'],

            'number' => ['required', 'array'],
            'number.*' => ['required', 'integer'],

            'shirt_size' => ['required', 'array'],
            'shirt_size.*' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],

            'short_size' => ['nullable', 'array'],
            'short_size.*' => ['nullable', 'in:xs,s,m,l,xl,2xl,3xl'],

            'quantity' => ['required', 'array'],
            'quantity.*' => ['required', 'integer', 'min:1'],

            // ================= GOALKEEPER FIELDS =================
            'goalkeeper_kit' => ['required', 'in:yes,no'],
            'goalkeeper_jersey_design' => ['nullable', 'in:same_as_player_uniform,custom_design'],
            'goalkeeper_sleeves' => ['nullable', 'in:long,short,padded_elbows'],
            'jersey_color' => ['nullable', 'in:same_as_top,same_as_pants,red,blue,black,white,other'],

            // ================= STAFF FIELDS =================
            'staff_other' => ['required', 'in:yes,no'],
            'staff_fit_type' => ['required', 'in:men,women'],
            'staff_kit_type' => ['required', 'in:full,shirt'],
            'staff_collar_type' => ['nullable', 'in:v-neck,round-neck,polo-style'],
            'staff_sleeves_length' => ['nullable', 'in:short,long'],

            // ================= GUIDE FIELDS =================
            'guide_name' => ['required', 'array'],
            'guide_name.*' => ['required', 'string', 'max:255'],

            'guide_number' => ['required', 'array'],
            'guide_number.*' => ['required', 'integer'],

            'guide_shirt_size' => ['required', 'array'],
            'guide_shirt_size.*' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],

            'guide_pant_size' => ['required', 'array'],
            'guide_pant_size.*' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],

            'guide_sleeves_length' => ['required', 'array'],
            'guide_sleeves_length.*' => ['required', 'in:short,long'],

            'guide_quantity' => ['required', 'array'],
            'guide_quantity.*' => ['required', 'integer', 'min:1'],

            // ================= OPTIONAL FIELDS =================
            'price' => ['nullable', 'numeric', 'min:0'],
            'pattern' => ['required', 'file'],
            'logo' => ['required', 'file'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ================= FILE UPLOADS =================
        $pattern = time() . '_pattern.' . $request->pattern->getClientOriginalExtension();
        $request->pattern->move(public_path('custom/pattern'), $pattern);

        $logo = time() . '_logo.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('custom/logo'), $logo);

        // ================= ARRAY DATA =================
        $names = $request->input('name', []);
        $numbers = $request->input('number', []);
        $shirt_sizes = $request->input('shirt_size', []);
        $short_sizes = $request->input('short_size', []);
        $quantities = $request->input('quantity', []);

        $bulkData = [];
        foreach ($names as $index => $name) {
            $bulkData[] = [
                'name' => $name,
                'number' => $numbers[$index] ?? null,
                'shirt_size' => $shirt_sizes[$index] ?? null,
                'short_size' => $short_sizes[$index] ?? null,
                'quantity' => $quantities[$index] ?? 1,
            ];
        }


        $guideNames = $request->input('guide_name', []);
        $guideNumbers = $request->input('guide_number', []);
        $guideShirtSizes = $request->input('guide_shirt_size', []);
        $guidePantSize = $request->input('guide_pant_size', []);
        $guideQuantities = $request->input('guide_quantity', []);

        $guideBulkData = [];
        foreach ($guideNames as $index => $guide_name) {
            $guideBulkData[] = [
                'guide_name' => $guide_name,
                'guide_number' => $guideNumbers[$index] ?? null,
                'guide_shirt_size' => $guideShirtSizes[$index] ?? null,
                'guide_pant_size' => $guidePantSize[$index] ?? null,
                'guide_sleeves_length' => $request->guide_sleeves_length[$index] ?? null,
                'guide_quantity' => $guideQuantities[$index] ?? 1,
            ];
        }

        // ================= SAVE TO DATABASE =================
        $customeUniform = new CustomUniform();
        $customeUniform->sleeves_length = $request->sleeves_length;
        $customeUniform->fit_type       = $request->fit_type;
        $customeUniform->kit_type       = $request->kit_type;
        $customeUniform->collar_type    = $request->collar_type;
        $customeUniform->team_logo      = $request->team_logo;
        $customeUniform->outfield_players_socks = $request->outfield_players_socks;
        $customeUniform->inside_shirt_collar    = $request->inside_shirt_collar;
        // $customeUniform->padded                = $request->padded;

        $customeUniform->goalkeeper_kit         = $request->goalkeeper_kit;
        $customeUniform->goalkeeper_jersey_design = $request->goalkeeper_jersey_design;
        $customeUniform->goalkeeper_sleeves     = $request->goalkeeper_sleeves;
        $customeUniform->jersey_color           = $request->jersey_color;

        $customeUniform->staff_other             = $request->staff_other;
        $customeUniform->staff_fit_type          = $request->staff_fit_type;
        $customeUniform->staff_kit_type          = $request->staff_kit_type;
        $customeUniform->staff_collar_type       = $request->staff_collar_type;
        $customeUniform->staff_sleeves_length    = $request->staff_sleeves_length;


        $customeUniform->logo     = $logo;
        $customeUniform->pattern  = $pattern;
        $customeUniform->bulk_data = json_encode($bulkData);
        $customeUniform->guide_bulk_data = json_encode($guideBulkData);
        $customeUniform->save();

        // ================= OPTIONAL: SHIRT IMAGE (BASE64) =================
        if ($request->filled('selected_shirt')) {
            $destination = public_path('custom-shirts');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $imageData = preg_replace('#^data:image/\w+;base64,#i', '', $request->selected_shirt);
            $filename = time() . '_shirt.png';
            file_put_contents($destination . '/' . $filename, base64_decode($imageData));

            $customeUniform->image = 'custom-shirts/' . $filename;
            $customeUniform->save();
        }

        return redirect()->route('custome.view')->with('success', 'Item added to cart!');
    }


    public function remove($index)
    {
        $cart = session()->get('custom_uniform_cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('custom_uniform_cart', array_values($cart)); // reindex array
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function clearCart()
    {
        session()->forget('custom_uniform_cart'); // pura cart clear
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }

    public function destroy($id)
    {
        $uniform = CustomUniform::findOrFail($id);
        $uniform->delete();

        return redirect()->route('custome.index')->with('success', 'Logo deleted successfully!');
    }
}