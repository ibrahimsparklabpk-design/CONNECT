<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Order;
use Illuminate\Http\Request;
use App\Models\sdk\CustomUniform;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function create()
    {
        $cart = session()->get('soccer_cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += ($item['price'] ?? 0); // total price
        }

        // total ko session me save kar do
        session(['total_amount' => $total]);

        return view('backend.checkout.create', compact('total'));
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'country' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zip_code' => 'required|string|max:20',
        'phone' => 'required|string|max:20',
        'account_holder_name' => 'required|string|max:255',

        // billing same agar unchecked hai tab ye required
        'billing_first_name' => 'required_if:billing_same,0|string|max:255',
        'billing_last_name'  => 'required_if:billing_same,0|string|max:255',
        'billing_address'    => 'required_if:billing_same,0|string|max:255',
        'billing_city'       => 'required_if:billing_same,0|string|max:255',
        'billing_state'      => 'required_if:billing_same,0|string|max:255',
        'billing_zip'        => 'required_if:billing_same,0|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // ✅ Total session/cart se nikaalo
    $total = session('custom_uniform_total', 0);

    if ($total <= 0) {
        return redirect()->back()->with('error', 'Cart is empty, please add items.');
    }

    // Order save karo
    $order = new Order();
    $order->email = $request->email;
    $order->country = $request->country;
    $order->first_name = $request->first_name;
    $order->last_name = $request->last_name;
    $order->address = $request->address;
    $order->city = $request->city;
    $order->state = $request->state;
    $order->zip_code = $request->zip_code;
    $order->phone = $request->phone;
    $order->account_holder_name = $request->account_holder_name;

    // ✅ DB me amount save
    $order->amount = $total;
    $order->save();

    // ✅ Stripe checkout
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $amount = $total * 100; // cents

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Custom Uniform Order',
                ],
                'unit_amount' => $amount,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'customer_email' => $request->email,
        'success_url' => route('static.view', ['session_id' => '{CHECKOUT_SESSION_ID}']),
        'cancel_url' => route('static.view'),
    ]);

    return redirect()->away($session->url);
}

}