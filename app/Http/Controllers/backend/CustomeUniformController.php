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
 // DB se uniforms lo (for listing)
    $customeUniform = CustomUniform::orderBy('id', 'desc')->paginate(3);

    // ✅ Session se cart items lo
    $sessionCart = session('custom_uniform_cart', []);

    // View me dono bhejo
    return view('backend.custome.view', compact('customeUniform', 'sessionCart'));
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

            // PLAYERS
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
            'price' => ['array'],
            'price.*' => ['nullable', 'numeric', 'min:0'],
            'total' => ['array'],
            'total.*' => ['nullable', 'numeric', 'min:0'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ================= FILE UPLOADS =================
        $pattern = time() . '_pattern.' . $request->pattern->getClientOriginalExtension();
        $request->pattern->move(public_path('custom/pattern'), $pattern);

        $logo = time() . '_logo.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('custom/logo'), $logo);

        // ================= BUILD BULK DATA =================
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

        // =================== TOTAL CALCULATION ===================
        $grandTotal = array_sum($totals ?? []);

        // =================== SAVE TO DATABASE ===================
        $customeUniform = new CustomUniform();
        $customeUniform->sleeves_length = $request->sleeves_length;
        $customeUniform->fit_type       = $request->fit_type;
        $customeUniform->kit_type       = $request->kit_type;
        $customeUniform->collar_type    = $request->collar_type;
        $customeUniform->team_logo      = $request->team_logo;
        $customeUniform->outfield_players_socks = $request->outfield_players_socks;
        $customeUniform->inside_shirt_collar    = $request->inside_shirt_collar;
        // $customeUniform->padded = $request->padded;

        $customeUniform->logo     = $logo;
        $customeUniform->pattern  = $pattern;
        $customeUniform->bulk_data = json_encode($bulkData); // ✅ Fixed here
        $customeUniform->grand_total = $grandTotal;
        $customeUniform->save();

        // =================== OPTIONAL: SAVE IMAGE ===================
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

        // =================== SAVE TO SESSION ===================
        $newItem = [
            'id' => $customeUniform->id,
            'name' => $bulkData[0]['name'] ?? 'N/A',
            'number' => $bulkData[0]['number'] ?? '--',
            'fit_type' => $customeUniform->fit_type,
            'kit_type' => $customeUniform->kit_type,
            'collar_type' => $customeUniform->collar_type,
            'team_logo' => $customeUniform->team_logo,
            'grand_total' => floatval($customeUniform->grand_total),
            'image' => $customeUniform->image ?? null,
            'bulk_data' => $bulkData, // save full bulkData, not flattened
            'created_at' => $customeUniform->created_at,
        ];

        // ✅ Purana cart le lo (agar session me already kuch items hain)
        $existingCart = session('custom_uniform_cart', []);

        // ✅ Naya item add karo
        $existingCart[] = $newItem;

        // ✅ Session me save karo
        session(['custom_uniform_cart' => $existingCart]);

        // =================== RETURN RESPONSE ===================
        return redirect()
            ->route('custome.view')
            ->with('success', 'Item added to cart!');
    }
    public function clearCart()
    {
        session()->forget('custom_uniform_cart'); // pura cart clear
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }

   public function destroy($index)
{
    // Session se cart fetch karo
    $sessionCart = session()->get('custom_uniform_cart', []);

    // Check karo index exist karta hai ya nahi
    if (isset($sessionCart[$index])) {
        unset($sessionCart[$index]); // item hata do

        // Session ko update karo (reindex karna zaroori hai)
        $sessionCart = array_values($sessionCart);
        session()->put('custom_uniform_cart', $sessionCart);

        return redirect()
            ->route('custome.view')
            ->with('success', 'Item removed from session cart successfully!');
    }

    // Agar item exist nahi karta
    return redirect()
        ->route('custome.view')
        ->with('error', 'Item not found in cart.');
}
}