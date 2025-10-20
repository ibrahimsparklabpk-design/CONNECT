<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Soccer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class SoccerController extends Controller
{

    public function index()
    {
        // $business = Auth::guard('business')->user();

        // if (!$business) {
        //     abort(403, 'You do not have permission to view this page.');
        // }

        // // ✅ Sirf logged-in business ke records lo
        // $soccers = Soccer::where('business_registrations_id', $business->id)
        //     ->latest()
        //     ->paginate(5);

        $soccers = Soccer::paginate(10);
        return view('dashboard.products.static.soccer', compact('soccers'));
    }
    public function view()
    {
        // Session se cart data lo
        $soccerCart = session()->get('soccer_cart', []);

        // View me bhejo
        return view('backend.static.view', compact('soccerCart'));
    }


    public function soccer()
    {
        return view('backend.static.soccer');
    }

    public function goalKeeper()
    {
        return view('backend.static.goalKeeper');
    }

    public function basketball()
    {
        return view('backend.static.basketball');
    }

    public function cricket()
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
            'inside_shirt_collar' => ['required', 'in:yes,no'],
            'padded' => ['nullable', 'in:yes,no'],
            'sleeves_length' => 'required|in:short,long,mix',
            'goalkeeper_kit' => ['required', 'in:yes,no'],
            'goalkeeper_jersey_design' => ['required', 'in:same_as_player_uniform,custom_design'],
            'goalkeeper_sleeves' => ['required', 'in:long,short,padded_elbows'],
            'jersey_color' => 'required|string',
            'staff_other' => ['required', 'in:yes,no'],
            'staff_fit_type' => ['required', 'in:men,women'],
            'staff_kit_type' => ['required', 'in:full,shirt'],
            'staff_collar_type' => ['required', 'in:v-neck,round-neck,polo-style'],
            'name' => ['required', 'array'],
            'name.*' => ['required', 'string', 'max:255'],
            'number' => ['required', 'array'],
            'number.*' => ['required', 'integer'],
            'shirt_size' => ['required', 'array'],
            'shirt_size.*' => ['required', 'in:xs,s,m,l,xl,2xl,3xl'],
            'quantity' => ['required', 'array'],
            'quantity.*' => ['required', 'integer', 'min:1'],
            'price' => ['array'],
            'price.*' => ['nullable', 'numeric', 'min:0'],
            'total' => ['array'],
            'total.*' => ['nullable', 'numeric', 'min:0'],
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
            'guide_price' => ['array'],
            'guide_price.*' => ['nullable', 'numeric', 'min:0'],
            'guide_total' => ['array'],
            'guide_total.*' => ['nullable', 'numeric', 'min:0'],
            'selected_shirt' => 'required|string'
        ]);

        $validator = Validator::make($request->all(), [/* ...rules... */]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // PLAYER DATA
        $bulkData = [];
        foreach ($request->input('name', []) as $i => $name) {
            $price = floatval($request->price[$i] ?? 0);
            $qty = intval($request->quantity[$i] ?? 1);
            $total = $price * $qty;
            $bulkData[] = [
                'name' => $name,
                'number' => $request->number[$i] ?? null,
                'shirt_size' => $request->shirt_size[$i] ?? null,
                'short_size' => $request->short_size[$i] ?? null,
                'quantity' => $qty,
                'price' => $price,
                'total' => $total,
            ];
        }

        // GUIDE DATA
        $guideBulkData = [];
        foreach ($request->input('guide_name', []) as $i => $guide_name) {
            $gprice = floatval($request->guide_price[$i] ?? 0);
            $gqty = intval($request->guide_quantity[$i] ?? 1);
            $gtotal = $gprice * $gqty;
            $guideBulkData[] = [
                'guide_name' => $guide_name,
                'guide_number' => $request->guide_number[$i] ?? null,
                'guide_shirt_size' => $request->guide_shirt_size[$i] ?? null,
                'guide_pant_size' => $request->guide_pant_size[$i] ?? null,
                'guide_sleeves_length' => $request->guide_sleeves_length[$i] ?? null,
                'guide_quantity' => $gqty,
                'guide_price' => $gprice,
                'guide_total' => $gtotal,
            ];
        }

        // GRAND TOTAL (calculated correctly)
        $grandTotal = array_sum(array_column($bulkData, 'total')) + array_sum(array_column($guideBulkData, 'guide_total'));

        // SAVE TO DB
        $soccer = new Soccer();
        $soccer->fill([
            'sleeves_length' => $request->sleeves_length,
            'fit_type' => $request->fit_type,
            'kit_type' => $request->kit_type,
            'collar_type' => $request->collar_type,
            'team_logo' => $request->team_logo,
            'outfield_players_socks' => $request->outfield_players_socks,
            'inside_shirt_collar' => $request->inside_shirt_collar,
            'goalkeeper_kit' => $request->goalkeeper_kit,
            'goalkeeper_jersey_design' => $request->goalkeeper_jersey_design,
            'goalkeeper_sleeves' => $request->goalkeeper_sleeves,
            'jersey_color' => $request->jersey_color,
            'staff_other' => $request->staff_other,
            'staff_fit_type' => $request->staff_fit_type,
            'staff_kit_type' => $request->staff_kit_type,
            'staff_collar_type' => $request->staff_collar_type,
            'staff_sleeves_length' => $request->staff_sleeves_length,
            'bulk_data' => json_encode($bulkData),
            'guide_bulk_data' => json_encode($guideBulkData),
            'grand_total' => $grandTotal,
        ]);

        // SAVE IMAGE
        $destination = public_path('selected-shirts');
        if (!file_exists($destination)) mkdir($destination, 0777, true);
        $originalPath = public_path(str_replace(url('/'), '', $request->selected_shirt));
        $filename = time() . '_' . basename($originalPath);
        copy($originalPath, $destination . '/' . $filename);
        $soccer->image = 'selected-shirts/' . $filename;
        $soccer->save();

        // SESSION CART
        $newItem = [
            'id' => $soccer->id,
            'name' => $bulkData[0]['name'] ?? 'N/A',
            'fit_type' => $soccer->fit_type,
            'kit_type' => $soccer->kit_type,
            'sleeves_length' => $soccer->sleeves_length,
            'grand_total' => $grandTotal,
            'image' => $soccer->image,
            'created_at' => $soccer->created_at,
        ];

        $cart = session()->get('soccer_cart', []);
        $cart[] = $newItem;
        session()->put('soccer_cart', $cart);

        return redirect()->route('static.view')->with('success', 'Item added to cart successfully!');
    }


    public function removeFromCart(Request $request, $index)
    {
        // Session se cart lo
        $cart = session()->get('soccer_cart', []);

        // Check karo item exist karta hai ya nahi
        if (isset($cart[$index])) {
            unset($cart[$index]); // Item remove karo
            $cart = array_values($cart); // Indexes reset karo
            session(['soccer_cart' => $cart]); // Session update karo
        }

        return redirect()->back()->with('success', 'Item removed successfully.');
    }

    public function clearCart()
    {
        // ✅ Session se cart remove karo
        session()->forget('soccer_cart');

        return redirect()
            ->back()
            ->with('success', 'Cart cleared successfully (session-based)!');
    }
}