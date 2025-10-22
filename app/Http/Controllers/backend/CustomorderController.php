<?php

namespace App\Http\Controllers\backend;

// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\sdk\CustomOrder;
use App\Models\sdk\CustomUniform;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomorderController extends Controller
{

    public function index()
{
    $customOrders = CustomOrder::with('uniforms')->latest()->paginate(5);

    return view('dashboard.orders.custom', compact('customOrders'));
}
    // ✅ Checkout page show karna (sirf custom uniform cart)
    public function create()
    {
        // Session cart fetch karo
        $sessionCart = session()->get('custom_uniform_cart', []);

        $totalPrice = 0;

        foreach ($sessionCart as $item) {
            $playerPrice = 0;
            if (!empty($item['bulk_data']) && is_array($item['bulk_data'])) {
                foreach ($item['bulk_data'] as $player) {
                    $playerPrice += floatval($player['total'] ?? 0);
                }
            }

            // Agar grand_total set hai, use karo
            $grandTotalItem = $item['grand_total'] ?? $playerPrice;
            $totalPrice += $grandTotalItem;
        }

        return view('backend.Checkout.custom-create', compact('sessionCart', 'totalPrice'));
    }
    // ✅ Checkout form submit (DB + Stripe)
    public function store(Request $request)
    {
        $request->validate([
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
            'total_amount' => 'required|numeric|min:0.01',
        ]);

        // ✅ Session cart fetch
        $sessionCart = session()->get('custom_uniform_cart', []);
        if (empty($sessionCart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        // ✅ Save Order to DB
        $order = new CustomOrder();
        $order->email = $request->email;
        $order->country = $request->country;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip_code = $request->zip_code;
        $order->phone = $request->phone;
        $order->account_holder_name = $request->account_holder_name;

        $order->amount = $request->total_amount;
        $order->save();
        $cart = session('custom_uniform_cart', []);
        foreach ($cart as $item) {
            $uniform = CustomUniform::find($item['id']);
            if ($uniform) {
                $uniform->orders_id = $order->id;
                $uniform->save();
            }
        }
        // ================= STRIPE CHECKOUT =================
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Stripe expects amount in cents
        $amountCents = $request->total_amount * 100;

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Custom Uniform Order #' . $order->id,
                    ],
                    'unit_amount' => $amountCents,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => $request->email,
            'success_url' => route('custome.view', ['session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('custome.view'),
        ]);


        session()->forget('custom_uniform_cart');


        return redirect()->away($session->url);
    }

   public function downloadPDF($orderId)
{
    set_time_limit(300); // 5 minutes

    $singleOrder = CustomOrder::with('uniforms')->findOrFail($orderId);
    $customUniforms = $singleOrder->uniforms;

    $pdf = Pdf::loadView('pdf.custom_orders_pdf', compact('singleOrder', 'customUniforms'))
        ->setOptions([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
        ]);

    return $pdf->download("order_{$orderId}.pdf");
}
}