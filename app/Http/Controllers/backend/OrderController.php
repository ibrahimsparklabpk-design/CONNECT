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
        // dd($request->all());
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

        $order = new Order();
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
        $order->billing_same = $request->billing_same;
        $order->billing_first_name = $request->billing_first_name;
        $order->billing_last_name = $request->billing_last_name;
        $order->billing_company = $request->billing_company;
        $order->billing_address = $request->billing_address;
        $order->billing_apartment = $request->billing_apartment;
        $order->billing_city = $request->billing_city;
        $order->billing_state = $request->billing_state;
        $order->billing_zip = $request->billing_zip;
        $order->billing_phone = $request->billing_phone;
    $order->amount = $request->amount; // jo checkout form se aaya
        $order->save();


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $amount = $request->amount * 100; // cents
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Custom Payment',
                    ],
                    'unit_amount' => $amount ,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => $request->email,
            'success_url' => route('order.create', ['session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('order.create'),
        ]);
        return redirect($session->url);
    }
}