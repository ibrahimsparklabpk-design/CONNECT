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
        $soccer = json_decode(request()->cookie('soccer_cart', '[]'), true);
        return view('backend.static.view', ['soccer' => $soccer]);
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
        // ✅ Validation Rules
        $validator = Validator::make($request->all(), [
    'fit_type' => ['required', 'in:men,women,youth'],
    'kit_type' => ['required', 'in:full,shirt,both'],
    'collar_type' => 'required|in:v-neck,round-neck,polo-style',
    'team_logo' => 'required|in:sublimated,embroidery',
    'outfield_players_socks' => ['required', 'in:yes,no'],
    'inside_shirt_collar' => ['required', 'in:yes,no'],
    'padded' => 'nullable|in:yes,no',
    'sleeves_length' => 'required|in:short,long,mix',
    'goalkeeper_kit' => ['required', 'in:yes,no'],
    'goalkeeper_jersey_design' => ['required', 'in:same_as_player_uniform,custom_design'],
    'goalkeeper_sleeves' => ['required', 'in:long,short,padded_elbows'],
    'jersey_color' => ['required', 'in:same_as_top,same_as_pants,red,blue,black,white,other'],

    'staff_other' => ['required', 'in:yes,no'],
    'staff_fit_type' => ['required', 'in:men,women'],
    'staff_kit_type' => ['required', 'in:full,shirt'],
    'staff_collar_type' => 'nullable|in:v-neck,round-neck,polo-style',
]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ✅ PLAYER DATA
        $bulkData = [];
        foreach ($request->input('name', []) as $index => $name) {
            $bulkData[] = [
                'name' => $name,
                'number' => $request->number[$index] ?? null,
                'shirt_size' => $request->shirt_size[$index] ?? null,
                'short_size' => $request->short_size[$index] ?? null,
                'quantity' => $request->quantity[$index] ?? 1,
                'price' => $request->price[$index] ?? 0,
                'total' => $request->total[$index] ?? 0,
            ];
        }

        // ✅ GUIDE DATA
        $guideBulkData = [];
        foreach ($request->input('guide_name', []) as $index => $gname) {
            $guideBulkData[] = [
                'guide_name' => $gname,
                'guide_number' => $request->guide_number[$index] ?? null,
                'guide_shirt_size' => $request->guide_shirt_size[$index] ?? null,
                'guide_pant_size' => $request->guide_pant_size[$index] ?? null,
                'guide_sleeves_length' => $request->guide_sleeves_length[$index] ?? null,
                'guide_quantity' => $request->guide_quantity[$index] ?? 1,
                'guide_price' => $request->guide_price[$index] ?? 0,
                'guide_total' => $request->guide_total[$index] ?? 0,
            ];
        }

        // ✅ GRAND TOTAL
        $grandTotal = array_sum($request->total ?? []) + array_sum($request->guide_total ?? []);

        // ✅ CREATE NEW RECORD
        $soccer = new Soccer();
        $soccer->fill($request->only([
            'fit_type',
            'kit_type',
            'collar_type',
            'team_logo',
            'outfield_players_socks',
            'inside_shirt_collar',
            'padded',
            'sleeves_length',
            'goalkeeper_kit',
            'goalkeeper_jersey_design',
            'goalkeeper_sleeves',
            'jersey_color',
            'staff_other',
            'staff_fit_type',
            'staff_kit_type',
            'staff_collar_type',
            'staff_sleeves_length',
        ]));

        $soccer->bulk_data = json_encode($bulkData);
        $soccer->guide_bulk_data = json_encode($guideBulkData);
        $soccer->grand_total = $grandTotal;

        // ✅ Save selected shirt
        if ($request->filled('selected_shirt')) {
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

        return redirect()->route('static.view')
            ->with('success', 'Record saved successfully with total price.');
    }

    public function removeFromCart(Request $request, $index)
    {
        $cart = json_decode($request->cookie('soccer_cart', '[]'), true);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart);
        }

        return redirect()->back()
            ->with('success', 'Item removed successfully.')
            ->cookie('soccer_cart', json_encode($cart), 60 * 24 * 7);
    }

    public function clearCart()
    {
        $cookie = cookie('soccer_cart', json_encode([]), -1);
        return redirect()->back()
            ->with('success', 'Cart cleared successfully.')
            ->withCookie($cookie);
    }
}
