<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\Models\MyCart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('cart');
       
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
    public function store(Request $request)
    {
        
        $carts = MyCart::where('product_id', $request->product_id)->exists();

    
        if ($carts) {
            return redirect()->back()->with('success_message', 'Item already in your cart!');

        } else {
            $cart= new MyCart;
        
            $cart->user_id =$request->user_id;
            $cart->quantity=$request->quantity;
            $cart->product_id=$request->product_id;
            $cart->save();
    
            return redirect()->back()->with('success_message', 'Item was added to your cart!');
        }
      
       
    
    }
    
    public function update(MyCart $myCart,Request $request)
    {
       MyCart::find($request->id)->increment('quantity', 1);
       // $myCart->where('id', $request->id)->update(['quantity' => $request->quantity]);
         
        //return redirect('cart')->with('success_message', 'Quantity updated!');
        return response()->json(['success'=>'Updated!']);

    }

       
    public function minus(MyCart $myCart,Request $request)
    {
       MyCart::find($request->id)->decrement('quantity', 1);
       // $myCart->where('id', $request->id)->update(['quantity' => $request->quantity]);
         
        //return redirect('cart')->with('success_message', 'Quantity updated!');
        return response()->json(['success'=>'Updated!']);

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

  /*  public function update(MyCart $myCart,Request $request)
    {
       
        $myCart->where('id', $request->id)->update(['quantity' => $request->quantity]);
         

       
        return redirect('cart')->with('success_message', 'Quantity updated!');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Cart::remove($id);

       // return back()->with('success_message', 'Item has been removed!');
       //return redirect()->back()->with('success_message', 'Item was added to your cart!');
    }

   
}
