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
    // ================= VALIDATION =================
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
        'staff_collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],

        // ================= PLAYERS =================
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

        // ✅ Players ke prices
        'price' => ['array'],
        'price.*' => ['nullable', 'numeric', 'min:0'],
        'total' => ['array'],
        'total.*' => ['nullable', 'numeric', 'min:0'],

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

        // ✅ Guides ke prices
        'guide_price' => ['array'],
        'guide_price.*' => ['nullable', 'numeric', 'min:0'],
        'guide_total' => ['array'],
        'guide_total.*' => ['nullable', 'numeric', 'min:0'],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // ================= PLAYER DATA =================
    $names = $request->input('name', []);
    $numbers = $request->input('number', []);
    $shirt_sizes = $request->input('shirt_size', []);
    $short_sizes = $request->input('short_size', []);
    $quantities = $request->input('quantity', []);
    $prices = $request->input('price', []);
    $totals = $request->input('total', []);

    $bulkData = [];
    foreach ($names as $index => $name) {
        $bulkData[] = [
            'name' => $name,
            'number' => $numbers[$index] ?? null,
            'shirt_size' => $shirt_sizes[$index] ?? null,
            'short_size' => $short_sizes[$index] ?? null,
            'quantity' => $quantities[$index] ?? 1,
            'price' => $prices[$index] ?? 0,
            'total' => $totals[$index] ?? 0,
        ];
    }

    // ================= GUIDE DATA =================
    $guideNames = $request->input('guide_name', []);
    $guideNumbers = $request->input('guide_number', []);
    $guideShirtSizes = $request->input('guide_shirt_size', []);
    $guidePantSizes = $request->input('guide_pant_size', []);
    $guideSleeves = $request->input('guide_sleeves_length', []);
    $guideQuantities = $request->input('guide_quantity', []);
    $guidePrices = $request->input('guide_price', []);
    $guideTotals = $request->input('guide_total', []);

    $guideBulkData = [];
    foreach ($guideNames as $index => $guide_name) {
        $guideBulkData[] = [
            'guide_name' => $guide_name,
            'guide_number' => $guideNumbers[$index] ?? null,
            'guide_shirt_size' => $guideShirtSizes[$index] ?? null,
            'guide_pant_size' => $guidePantSizes[$index] ?? null,
            'guide_sleeves_length' => $guideSleeves[$index] ?? null,
            'guide_quantity' => $guideQuantities[$index] ?? 1,
            'guide_price' => $guidePrices[$index] ?? 0,
            'guide_total' => $guideTotals[$index] ?? 0,
        ];
    }

    // ✅ Calculate Grand Total of both Players + Guides
    $grandTotal = array_sum($totals) + array_sum($guideTotals);

    // ================= CREATE NEW RECORD =================
    $soccer = new Soccer();

    // Main Fields
    $soccer->sleeves_length = $request->sleeves_length;
    $soccer->fit_type = $request->fit_type;
    $soccer->kit_type = $request->kit_type;
    $soccer->collar_type = $request->collar_type;
    $soccer->team_logo = $request->team_logo;
    $soccer->outfield_players_socks = $request->outfield_players_socks;
    $soccer->inside_shirt_collar = $request->inside_shirt_collar;

    // Goalkeeper Info
    $soccer->goalkeeper_kit = $request->goalkeeper_kit;
    $soccer->goalkeeper_jersey_design = $request->goalkeeper_jersey_design;
    $soccer->goalkeeper_sleeves = $request->goalkeeper_sleeves;
    $soccer->jersey_color = $request->jersey_color;

    // Staff Info
    $soccer->staff_other = $request->staff_other;
    $soccer->staff_fit_type = $request->staff_fit_type;
    $soccer->staff_kit_type = $request->staff_kit_type;
    $soccer->staff_collar_type = $request->staff_collar_type;
    $soccer->staff_sleeves_length = $request->staff_sleeves_length;

    // Bulk Data
    $soccer->bulk_data = json_encode($bulkData);
    $soccer->guide_bulk_data = json_encode($guideBulkData);
    $soccer->grand_total = $grandTotal; // ✅ total of both sections

    // ================= SAVE SELECTED SHIRT =================
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

    // ================= SAVE RECORD =================
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