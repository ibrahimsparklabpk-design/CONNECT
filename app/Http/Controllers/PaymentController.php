<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\CustomProduct;
use App\Models\CustomProductsSizeGuide;
use App\Models\CustomProductsSizeStaff;
use App\Models\ShopProduct;
use App\Models\CustomePayment;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;



class PaymentController extends Controller
{

    public function showPaymentForm()
    {
        // Payment form ko render karo
        return view('payment.form');
    }

    public function createPaymentIntent(Request $request)
    {


        $paymentData = $request->all();






        session(['paymentData' => $paymentData]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $totalPrice = session('totalPrice');
            $amountInCents = $totalPrice * 100;

            $paymentIntent = PaymentIntent::create([
                'amount' =>  $amountInCents,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);




            return response()->json(['client_secret' => $paymentIntent->client_secret]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }




    // this method is store product data after payment successful    
    public function storeCustomProduct(Request $request)
    {


        $formData = session()->get('formData');
        $customerId = session('user')->id ?? null;
        $paymentData = session()->get('paymentData');
        $customImage = session('custom_image');





        if (!$formData || !$customerId) {
            return response()->json(['success' => false, 'error' => 'Session data is missing.']);
        }


        try {


            // Insert data into CustomProduct table
            // $customProduct = 
            CustomProduct::create([
                'customer_id' => $customerId,
                'sleeve_length' => $formData['sleeve-length'] ?? '', // Use empty string if not set
                'team_logo' => $formData['team-logo'] ?? '',
                'collar_type' => $formData['collar-type'] ?? '',
                'kit' => $formData['kit'] ?? '',
                'fit_type' => $formData['fit-type'] ?? '',
                'inside_collar_message' => $formData['inside-collar-message'] ?? '',
                'socks' => $formData['socks'] ?? '',
                'collar_text' => $formData['inside_collar_message_text'] ?? '',
                'socks_color' => $formData['socks-color'] ?? '',
                'goalkeeper_kit' => $formData['goalkeeper-kit'] ?? '',
                'padded' => $formData['padded'] ?? '',
                'goalkeeper_sleeve' => $formData['goalkeeper-sleeve'] ?? '',
                'goalkeeper_jersey_design' => $formData['goalkeeper-jersey-design'] ?? '',
                'jersey_color' => $formData['jersey-color'] ?? '',
                'staff_other' => $formData['staff-other'] ?? '',
                'staff_kit' => $formData['staff-kit'] ?? '',
                'staff_collar_type' => $formData['staff-collar-type'] ?? '',
                'staff_fit_type' => $formData['staff-fit-type'] ?? '',

                'custom_image' =>  $customImage,



            ]);



            // Insert data into CustomProductsSizeGuide table
            $names = $formData['name'];
            $numbers = $formData['number'];
            $shortSizes = $formData['short_size'];
            $shirtSizes = $formData['shirt_size'];
            $quantities = $formData['quantity'];

            // Loop  for multipal insert data
            for ($i = 0; $i < count($names); $i++) {
                CustomProductsSizeGuide::create([
                    'customer_id' => $customerId, // Customer ID

                    'size_guide_name' => $names[$i],
                    'size_guide_number' => $numbers[$i],
                    'size_guide_short_size' => $shortSizes[$i],
                    'size_guide_shirt_size' => $shirtSizes[$i],
                    'size_guide_quantity' => $quantities[$i],
                ]);
            }


            // Insert data into custom products size staff table
            $staffNames = $formData['staff-name'];
            $sleevelength = $formData['sleeve_length'];
            $pantsLengths = $formData['Pants-Length'];
            $shirtSizes = $formData['staff_shirt_size'];
            $pantsSizes = $formData['staff_pant_size'];
            $quantities = $formData['shirt_paint_quantity'];


            // Loop for multipal insert data

            for ($i = 0; $i < count($staffNames); $i++) {
                if (isset($staffNames[$i], $sleevelength[$i], $pantsLengths[$i], $shirtSizes[$i], $pantsSizes[$i], $quantities[$i])) {
                    CustomProductsSizeStaff::create([
                        'customer_id' => $customerId,
                        'staff_name' => $staffNames[$i],
                        'staff_sleeves_length' =>  $sleevelength[$i],
                        'staff_pants_length' => $pantsLengths[$i],
                        'staff_shirt_size' => $shirtSizes[$i],
                        'staff_pants_size' => $pantsSizes[$i],
                        'staff_quantity' => $quantities[$i],
                    ]);
                } else {
                    Log::warning("Missing data for index $i", [
                        'staff_name' => isset($staffNames[$i]) ? $staffNames[$i] : null,
                        'sleeve_length' => isset($sleevelength[$i]) ? $sleevelength[$i] : null,
                        'pants_length' => isset($pantsLengths[$i]) ? $pantsLengths[$i] : null,
                        'shirt_size' => isset($shirtSizes[$i]) ? $shirtSizes[$i] : null,
                        'pants_size' => isset($pantsSizes[$i]) ? $pantsSizes[$i] : null,
                        'quantity' => isset($quantities[$i]) ? $quantities[$i] : null,
                    ]);
                }
            }


            // Insert data into CustomPayments table
            $totalPrice = session()->get('totalPrice');
            $totalQuantity = session()->get('totalQuantity');
            $Price = session()->get('Price');



            CustomePayment::create([
                'customer_id' => $customerId,
                'p_email' => $paymentData['email'] ?? null,
                'delivery_country' => $paymentData['country'] ?? null,
                'delivery_first_name' => $paymentData['first_name'] ?? null,
                'delivery_last_name' => $paymentData['last_name'] ?? null,
                'delivery_company' => $paymentData['company'] ?? null,
                'delivery_address' => $paymentData['address'] ?? null,
                'delivery_apartment' => $paymentData['apartment'] ?? null,
                'delivery_city' => $paymentData['city'] ?? null,
                'delivery_state' => $paymentData['state'] ?? null,
                'delivery_zip_code' => $paymentData['zip'] ?? null,
                'delivery_phone' => $paymentData['phone'] ?? null,
                'account_holder_name' => $paymentData['Account_Holder_Name'] ?? null,
                'billing_first_name' => $paymentData['billing_first_name'] ?? null,
                'billing_last_name' => $paymentData['billing_last_name'] ?? null,
                'billing_company' => $paymentData['billing_company'] ?? null,
                'billing_address' => $paymentData['billing_address'] ?? null,
                'billing_apartment' => $paymentData['billing_apartment'] ?? null,
                'billing_city' => $paymentData['billing_city'] ?? null,
                'billing_state' => $paymentData['billing_state'] ?? null,
                'billing_zip_code' => $paymentData['billing_zip'] ?? null,
                'billing_phone' => $paymentData['billing_phone'] ?? null,

                'price' =>  $Price,
                'total_quantity' => $totalQuantity,
                'payment' => $totalPrice,



            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }





    // Shop page product payment

    public function ShopCheckout()
    {
        return view('shop_checkout');
    }



    public function ShopProductPayment(Request $request)
    {
        $paymentData = $request->all();





        session(['paymentData' => $paymentData]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {

            $totalPrice = session()->get('total_price', 0);
            $amountInCents = $totalPrice * 100;

            $paymentIntent = PaymentIntent::create([
                'amount' =>  $amountInCents,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);

            return response()->json(['client_secret' => $paymentIntent->client_secret]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }






    public function StoreShopProductData(Request $request)
    {
        Log::info('Session Data:', session()->all());

        // Get customer ID from the session
        $customerId = session('user')->id ?? null;

        // Get payment data from the session
        $paymentData = session()->get('paymentData', []);

        // Get total price from the session
        $totalPrice = session()->get('total_price', 0);
        $cartItems = session()->get('cart', []);


        // Create a new ShopProduct instance

        // $cartItems = session()->get('cart', []);


        try {

            // Insert data into CustomProduct table

            foreach ($cartItems as $item) {
                $shopProduct = new ShopProduct();


                $shopProduct->customer_id = $customerId;
                $shopProduct->email = $paymentData['email'] ?? null; // Assuming 'email' is in paymentData

                $shopProduct->delivery_country = $paymentData['country'] ?? null;
                $shopProduct->delivery_first_name = $paymentData['first_name'] ?? null;
                $shopProduct->delivery_last_name = $paymentData['last_name'] ?? null;
                $shopProduct->delivery_company = $paymentData['company'] ?? null;
                $shopProduct->delivery_address = $paymentData['address'] ?? null;
                $shopProduct->delivery_apartment = $paymentData['apartment'] ?? null;
                $shopProduct->delivery_city = $paymentData[' city'] ?? null;
                $shopProduct->delivery_state = $paymentData['state'] ?? null;
                $shopProduct->delivery_zip_code = $paymentData['zip'] ?? null;
                $shopProduct->delivery_phone = $paymentData['phone'] ?? null;
                $shopProduct->billing_first_name = $paymentData['billing_first_name'] ?? null;
                $shopProduct->billing_last_name = $paymentData['billing_last_name'] ?? null;
                $shopProduct->billing_company = $paymentData['billing_company'] ?? null;
                $shopProduct->billing_address = $paymentData['billing_address'] ?? null;
                $shopProduct->billing_apartment = $paymentData['billing_apartment'] ?? null;
                $shopProduct->billing_city = $paymentData['billing_city'] ?? null;
                $shopProduct->billing_state = $paymentData['billing_state'] ?? null;
                $shopProduct->billing_zip_code = $paymentData['billing_zip'] ?? null;
                $shopProduct->account_holder_name = $paymentData['Account_Holder_Name'] ?? null;

                $shopProduct->price = $item['price'] ?? 0; // Assuming 'price' is also in paymentData
                $shopProduct->quantity = $item['quantity'] ?? 1; // Default to 1 if not provided
                $shopProduct->total_price = $totalPrice;
                $shopProduct->product_title = $item['title'] ?? null;
                $shopProduct->product_color = $item['color'] ?? null;
                $shopProduct->product_size = $item['size'] ?? null;



                // Optionally, if you want to associate the customerId, you may need to add a customer_id field to your shop_products table
                // $shopProduct->customer_id = $customerId;

                // Save the product to the database
                $shopProduct->save();
            }
            session()->forget('cart', []);





            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}