<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function create(){
        return view('backend.checkout.create');
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
        $order->news_offers = $request->news_offers;
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

        $order->save();

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}