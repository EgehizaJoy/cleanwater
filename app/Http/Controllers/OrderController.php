<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Order;
use App\Models\Ordertotal;
use App\Models\MyCart;
use App\Models\Inventory;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Inventory $stock)
    { 

        
        $ordertotal = Ordertotal::create($request->except(['_token']));

        $orderid = $ordertotal->id;
        $userid = $ordertotal->user_id;
        $items = MyCart::all();

        foreach($items as $item){
            $order = new Order;

            
            $productid = $item->product_id;
             $product_quantity =  $item->quantity;
          
            $order->product_id = $productid;
            $order->quantity = $product_quantity;
            $order->order_id = $orderid;
            $order->user_id = $userid;
            $order->save();
			
            $stock->where('product_id',$order->product_id)
            
            ->update(['quantity' => $stock->quantity-$order->quantity]);
      

        }
     

      return redirect('checkout');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
