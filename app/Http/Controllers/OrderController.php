<?php

namespace App\Http\Controllers;


use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\UserMabar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config as Enter;

class OrderController extends Controller
{
    public function index(){
        return view('order.checkout');
    }

    public function checkout(Request $request, $id){
        $checkoutmabar = UserMabar::find($id);

        $request->request->add([
            'total price' => $request->checkoutmabar->harga_tiket, 
            'status' => 'Unpaid'
        ]);

        $order = Order::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $request->nama,
                'nomor_telepon' => $request->nomor_telepon,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('order.checkout', compact(['snapToken', 'order']));
    }
}
