<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;

class CustomerOrders extends Controller
{
    function orders()
    {

      //  return view('admin.Orders.orders', ['orders'=>Order::paginate(10) ]);
    
    
      $orders= DB::table('orders')
       ->join('products','orders.product_id','=','products.id')
       ->join('users','orders.user_id','=','users.id')
       ->join('ordertotals','orders.order_id','=','ordertotals.id')
       ->join('checkouts','orders.user_id','=','checkouts.user_id')
     
      //->select('products.*','carts.id as cart_id','carts.quantity as cart_qty','carts.product_id as product_id')
      ->select('orders.*', 'products.product_name','products.price', 'users.id as user_id','users.name as user_name','users.phone','ordertotals.total','ordertotals.id as order_id','checkouts.county','checkouts.email')
      // ->get();
      ->paginate(7);
    
   
       return view('admin.Orders.orders',['orders'=>$orders]);
       
    }


    function userorder()
  
    
    {
        if (Session::has('user')) {

        
        
        $orders= DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
        ->join('ordertotals','orders.order_id','=','ordertotals.id')
        ->join('checkouts','orders.user_id','=','checkouts.user_id')
      
        ->select('products.*','products.image as image','orders.quantity as order_qty','orders.order_id as order_id')
      
       // ->get();
       ->paginate(7);
     
        return view('customerorder',['orders'=>$orders]);
        }
    }

}
