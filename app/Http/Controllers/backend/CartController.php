<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\sdk\CustomUniform;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart($id)
    {
        $product = CustomUniform::findOrFail($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
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


    public function show()
    {
        $cart = session('cart', []);
        return view('backend.cart.index', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function removeFromCart($index)
{
    $cart = session()->get('custom_uniform_cart', []);

    if (isset($cart[$index])) {
        unset($cart[$index]);
        session()->put('custom_uniform_cart', array_values($cart)); // Reindex array
    }

    return redirect()->back()->with('success', 'Item removed from cart.');
}
}