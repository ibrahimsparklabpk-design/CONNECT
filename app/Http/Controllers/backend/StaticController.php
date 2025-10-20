<?php

namespace App\Http\Controllers\backend;

use App\Models\sdk\Soccer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\sdk\Order;

class StaticController extends Controller
{
   public function staticOrdershow()
    {
        $products = Soccer::paginate(10);
        // $customerIds = $products->pluck('customer_id');

        // $sizeGuides = DB::table('custom_products_size_guides')
        //     ->whereIn('customer_id', $customerIds)
        //     ->get();

        // $sizeStaffs = DB::table('custom_products_size_staff')
        //     ->whereIn('customer_id', $customerIds)
        //     ->get();

        $customePayments = DB::table('custome_payments')
            
            ->get();












        // return view('admin_custom_order_show', compact('customers')); 
        return view('admin_static_order_show', compact('products', 'customePayments'));
    }
}