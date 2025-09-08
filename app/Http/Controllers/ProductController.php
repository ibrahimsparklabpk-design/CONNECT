<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use App\Models\VariationImage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\File; // File facade ko import kar rahe hain
use App\Models\CustomDesign;

class ProductController extends Controller
{
    // Form dikhane ka function
    public function create()
    {
        return view('create_product');
    }

    // Data store karne ka function
    // public function store(Request $request)
    // {
    //     // Validate incoming request
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'category' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',


    //         'colors' => 'required|array',
    //         'variation_stock' => 'required|array',
    //         'color_images' => 'required|array',
    //     ]);








    //     // Image ko store karna (agar hai)
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images', 'public');
    //     } else {
    //         $imagePath = null;
    //     }

    //     // Product create karna
    //     Product::create([
    //         'title' => $validated['title'],
    //         'description' => $validated['description'],
    //         'price' => $validated['price'],
    //         'stock_quantity' => $validated['stock_quantity'],
    //         'category' => $validated['category'],
    //         'image' => $imagePath,  // Image path save karna
    //     ]);

    //     // Redirect karna with success message
    //     return redirect()->route('create_product')->with('success', 'Product created successfully!');
    // }

    public function store(Request $request)
    {

        // Validate request
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sizes' => 'required|array',
            'sizes.*' => 'required|string',
            'stock_quantity' => 'required|integer|min:0',
            'category' => 'required|string',
            'image' => 'required|image',
            'colors' => 'required|array',
            'variation_stock' => 'required|array',
            'color_images' => 'required|array',
            'color_images.*' => 'image',
        ]);

        // Check if data is validated
        // dd($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Create Product
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        // Create Variations 
        foreach ($request->colors as $index => $color) {
            // Variation banayein
            $variation = Variation::create([
                'product_id' => $product->id,
                'color' => $color,
                'size' => $request->sizes[$index],

                'stock_quantity' => $request->variation_stock[$index],
            ]);

            // Variation Image ko store karein agar image available hai
            if ($request->hasFile("color_images.$index")) {
                $variationImages = $request->file("color_images.$index");

                // Agar single image hai toh direct store karein
                if (is_array($variationImages)) {
                    foreach ($variationImages as $image) {
                        VariationImage::create([
                            'variation_id' => $variation->id,
                            'image' => $image->store('variations', 'public'),
                        ]);
                    }
                } else {
                    // Single image case ke liye
                    VariationImage::create([
                        'variation_id' => $variation->id,
                        'image' => $variationImages->store('variations', 'public'),
                    ]);
                }
            }
        }

        return redirect()->route('create_product')->with('success', 'Product created successfully!');
    }







    public function displayProduct()
    {

        $products = Product::all(); // Products table se saara data fetch karna
        return view('shop', compact('products'));
    }



    // single PRoduct page
    public function singleProduct($id)
    {
        $product = Product::with('variations.images')->find($id);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $id) // Exclude the current product
            ->get();

        $colors = $product->variations->map(function ($variation) {
            return [
                'color' => $variation->color,
                'size' => $variation->size,
                'image' => $variation->images->first() ? asset('storage/' . $variation->images->first()->image) : null,
                'stock_quantity' => $variation->stock_quantity
            ];
        });
        // dd($colors);
        $sizes = $product->variations->pluck('size')->unique();

        return view('Single_Product', compact('product', 'colors', 'relatedProducts', 'sizes'));
    }




    // product add to cart

    public function AddToCart(Request $request)
    {


        if (!session('user')) {

            return redirect()->route('login')->with('error', 'First, you need to log in, then you can buy something.');
        }

        try {
            // Validate the incoming request
            $request->validate([
                'title' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'required|url',
                'color' => 'nullable|string',
                'size' => 'nullable|string',
                'quantity' => 'required|integer|min:1',
            ]);

            // Dump the data for debugging
            Log::info('Request data:', $request->all());




            $cart = session()->get('cart', []); // Agar cart nahi hai to empty array milega

            // Product data ko add karna
            $cartData = [

                'image' => $request->input('image'),
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'color' => $request->input('color'),
                'size' => $request->input('size'),
                'quantity' => $request->input('quantity'),
            ];
            // session()->forget('cart');
            $cart[] = $cartData;
            session()->put('cart', $cart);
            // Cart ko session mein store karna
            // session()->put('cart', $cart);

            // session()->put('cart', [$cartData]);

            $totalPrice = 0;
            foreach (session('cart') as $item) {
                $totalPrice += $item['price'] * $item['quantity']; // Multiply price by quantity
            }

            // Store total price in session (optional)
            session()->put('total_price', $totalPrice);

            // dd(session('cart'));



            // session()->forget('cart');
            // session()->put('cart', $request->all());
            // dd(session()->all());
            // return view('product_AddToCart')->with('cart', session('cart'));

            // return view('product_AddToCart')->with('cart', session('cart'))
            // return view('product_AddToCart')->with('cart', $cart);
            return view('product_AddToCart', ['cart' => session('cart'), 'total_price' => $totalPrice]);
        } catch (\Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Unable to add to cart.'], 500);
        }
    }





   
}