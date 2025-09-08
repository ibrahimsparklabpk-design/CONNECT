<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class AddToCart extends Controller
{


    // Custom image save
    public function saveImage(Request $request)
    {
        // Step 1: Get the base64 image data
        $imageData = $request->input('image');

        // Step 2: Decode the base64 data and prepare file name
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData) = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        // Step 3: Generate a unique file name
        $fileName = 'uploads/custom_image_' . time() . '.png';

        // Step 4: Save the file in storage (public disk)
        Storage::disk('public')->put($fileName, $imageData);

        // Step 5: Get the file path
        $filePath = 'storage/' . $fileName;

        // Step 6: Store the file path in session
        session(['custom_image' => $filePath]);
    }




    public function addToCart_get()
    {
        return view('custom_productaddToCart');
    }

    public function addToCart(Request $request)
    {
        $formData = session()->get('formData');


        if (!session('user')) {

            return redirect()->route('login')->with('error', 'First, you need to log in, then you can buy something.');
        }

        // $formData = session()->get('formData');
        $formData = $request->all();
        $price = $request->input('price');
        $shirtPaintQuantities = $request->input('shirt_paint_quantity');
        $quantities = $request->input('quantity');

        $totalPrice = 0;
        $totalQuantity = 0;


        $mergedQuantities = array_map(function ($a, $b) {
            return $a + $b;
        }, $shirtPaintQuantities, $quantities);


        foreach ($mergedQuantities as $quantity) {
            $totalPrice += $price * $quantity;
            $totalQuantity += $quantity;
        }

        session(['Price' =>  $price]);
        session(['totalPrice' => $totalPrice]);
        session(['totalQuantity' => $totalQuantity]);



        session(['formData' => $formData]);
        $customImage = session('custom_image');



        return view('custom_product_addToCart', compact('formData', 'totalPrice', 'totalQuantity', 'customImage'));
    }

    // checkout function
    public function checkout()
    {
        // $customImage = session('custom_image');

        // return view('checkout', compact('customImage'));
        return view('checkout');
    }
}