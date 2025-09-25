<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\sdk\CustomOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomorderController extends Controller
{
    // ✅ Checkout page show karna (sirf custom uniform cart)
    public function create()
    {
        $customeCart = session()->get('custom_uniform_cart', []);
        $total = 0;

        foreach ($customeCart as $item) {
            $total += ($item['total'] ?? 0) + ($item['guide_total'] ?? 0);
        }

        return view('backend.checkout.custom-create', compact('total', 'customeCart'));
    }

    // ✅ Checkout form submit (DB + Stripe)
    public function store(Request $request)
    {
        // 🔹 Validation
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

            // billing agar "same" na ho
            'billing_first_name' => 'required_if:billing_same,false|string|max:255',
            'billing_last_name' => 'required_if:billing_same,false|string|max:255',
            'billing_address' => 'required_if:billing_same,false|string|max:255',
            'billing_city' => 'required_if:billing_same,false|string|max:255',
            'billing_state' => 'required_if:billing_same,false|string|max:255',
            'billing_zip' => 'required_if:billing_same,false|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // 🔹 Session cart se total calculate
        $customeCart = session()->get('custom_uniform_cart', []);
        $total = 0;
        foreach ($customeCart as $item) {
            $total += ($item['total'] ?? 0) + ($item['guide_total'] ?? 0);
        }

        if ($total <= 0) {
            return redirect()->back()->with('error', 'Cart is empty, please add items.');
        }

        // 🔹 Save Order in DB
        $order = new CustomOrder();
        $order->email = $request->email;
        $order->country = $request->country;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->company = $request->company;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip_code = $request->zip_code;
        $order->phone = $request->phone;
        $order->account_holder_name = $request->account_holder_name;

        // billing info
        $order->billing_same = $request->billing_same ?? true;
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_company = $request->billing_company;
        $order->billing_address = $request->billing_address;
        $order->billing_apartment = $request->billing_apartment;
        $order->billing_city = $request->billing_city;
        $order->billing_state = $request->billing_state;
        $order->billing_zip = $request->billing_zip;
        $order->billing_phone = $request->billing_phone;

        $order->amount = $total;
        $order->currency = "usd";
        $order->payment_status = "pending";
        $order->save();

        // 🔹 Stripe Checkout
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
            'success_url' => route('custome.view', ['session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('custome.view'),
        ]);
 session()->forget('custom_uniform_cart');
        // stripe session id db me save
        $order->stripe_session_id = $session->id;
        $order->save();

        return redirect($session->url);
    }
}