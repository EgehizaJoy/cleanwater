<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\MyCart;


class CartList extends Controller
{

   
    function cart()
  
    
    {
        if (Session::has('user')) {

        $userId=Session::get('user')['id'];
        
       $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
       ->select('products.*','carts.id as cart_id','carts.quantity as cart_qty','carts.product_id as product_id')
     // ->sum('products.price')
        ->get();
     
        return view('cart',['products'=>$products]);
        }
    }

    function removeCart($id)
    {
        MyCart::destroy($id);
        return redirect()->back()->with('success_message', 'Item removed from your cart!');
    }

    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return MyCart::where('user_id',$userId)->count();
    }

    function checkoutlist()
    {

        if (Session::has('user')) {

        $userId=Session::get('user')['id'];
       $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
       ->select('products.*','carts.id as cart_id','carts.quantity as cart_qty','carts.product_id as product_id')
     // ->sum('products.price')
        ->get();
     
        return view('checkout',['products'=>$products]);
        }
    }

   

}
