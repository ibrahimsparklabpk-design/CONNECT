<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomePayment;
use App\Models\CustomProduct;
use App\Models\CustomProductsSizeGuide;
use App\Models\CustomProductsSizeStaff;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


// use Barryvdh\DomPDF\Facade as Pdf;

class OrderShow extends Controller
{
    public function CustomOrdershow()
    {
        $products = CustomProduct::all();
        $customerIds = $products->pluck('customer_id');

        $sizeGuides = DB::table('custom_products_size_guides')
            ->whereIn('customer_id', $customerIds)
            ->get();

        $sizeStaffs = DB::table('custom_products_size_staff')
            ->whereIn('customer_id', $customerIds)
            ->get();

        $customePayments = DB::table('custome_payments')
            ->whereIn('customer_id', $customerIds)
            ->get();












        // return view('admin_custom_order_show', compact('customers')); 
        return view('admin_custom_order_show', compact('products', 'sizeGuides', 'sizeStaffs', 'customePayments'));
    }


    public function downloadPDF()
    {


        $products = CustomProduct::all();
        $customerIds = $products->pluck('customer_id');

        $sizeGuides = DB::table('custom_products_size_guides')
            ->whereIn('customer_id', $customerIds)
            ->get();

        $sizeStaffs = DB::table('custom_products_size_staff')
            ->whereIn('customer_id', $customerIds)
            ->get();

        $customePayments = DB::table('custome_payments')
            ->whereIn('customer_id', $customerIds)
            ->get();









        $data = [
            'products' => $products,
            'customePayments' => $customePayments,
            'sizeGuides' => $sizeGuides,
            'sizeStaffs' => $sizeStaffs
        ];

        $pdf = Pdf::loadView('pdf-template', $data);

        return response()->stream(function () use ($pdf) {
            echo $pdf->output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="order-details.pdf"', // Inline for viewing in the browser
        ]);

    }
    
    
    
//   public function downloadPDF($productId)
// {
//     // Specific product ke data ko fetch karein
//     $product = CustomProduct::findOrFail($productId);
//     $customerId = $product->customer_id;

//     // Related data fetch karein
//     $sizeGuides = DB::table('custom_products_size_guides')
//         ->where('customer_id', $customerId)
//         ->get();

//     $sizeStaffs = DB::table('custom_products_size_staff')
//         ->where('customer_id', $customerId)
//         ->get();

//     $customePayments = DB::table('custome_payments')
//         ->where('customer_id', $customerId)
//         ->get();

//     // Data pass karein view mein
//     $data = [
//         'product' => $product,
//         'customePayments' => $customePayments,
//         'sizeGuides' => $sizeGuides,
//         'sizeStaffs' => $sizeStaffs
//     ];

//     // PDF generate karein
//     $pdf = Pdf::loadView('pdf-template', $data);

//     return response()->stream(function () use ($pdf) {
//         echo $pdf->output();
//     }, 200, [
//         'Content-Type' => 'application/pdf',
//         'Content-Disposition' => 'inline; filename="order-details-' . $product->id . '.pdf"', 
//     ]);
// }







    public function showAllCustomersData()
    {
        // Get all unique customer IDs from all tables
        $customerIds = CustomePayment::distinct('customer_id')->pluck('customer_id')
            ->merge(CustomProduct::distinct('customer_id')->pluck('customer_id'))
            ->merge(CustomProductsSizeGuide::distinct('customer_id')->pluck('customer_id'))
            ->merge(CustomProductsSizeStaff::distinct('customer_id')->pluck('customer_id'))
            ->unique(); // Ensure unique customer IDs

        // Fetch all data for each customer
        $customersData = [];

        foreach ($customerIds as $customerId) {
            $payments = CustomePayment::where('customer_id', $customerId)->get();
            $products = CustomProduct::where('customer_id', $customerId)->get();
            $sizeGuides = CustomProductsSizeGuide::where('customer_id', $customerId)->get();
            $sizeStaff = CustomProductsSizeStaff::where('customer_id', $customerId)->get();

            // Store all data for each customer in an associative array
            $customersData[$customerId] = [
                'payments' => $payments,
                'products' => $products,
                'sizeGuides' => $sizeGuides,
                'sizeStaff' => $sizeStaff,
            ];
        }

        // Pass data to view
        return view('admin_custom_order_show_all', compact('customersData'));
    }
}

