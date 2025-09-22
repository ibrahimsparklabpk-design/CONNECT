<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\sdk\CustomUniform;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function cart($id)
    {
            $product = CustomUniform::findOrFail($id);

    $cart = session()->get('cart', []);

    // If product already in cart, increase quantity
    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        // Otherwise add new product
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'image' => $product->image ?? null,
        ];
    }

    session(['cart' => $cart]);
    return redirect()->back()->with('success', 'Product added to cart!');


    }
}