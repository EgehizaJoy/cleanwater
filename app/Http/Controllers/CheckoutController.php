<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'fname' => $request->email,
            'lname' => $request->name,
            'phone' => $request->address,
            'email' => $request->city,
            'deliverytype' => $request->province,
            'county' => $request->postalcode,
            'town' => $request->phone,
            'housenumber' => $request->name_on_card,
            'additionalinfo' => $request->name_on_card,
            'expecteddeliveryday' => $request->name_on_card,
            'expectedtime' => $request->name_on_card,



            'billing_discount' => $request->discount,
            'billing_discount_code' => $request->disount_code,
            
            'billing_total' => $request->total,
           
        ]);

        // Insert into order_product table
        foreach (MyCart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
            ]);
        }

        return $order;
    }
}
