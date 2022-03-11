<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Quotation;


class QuotationController extends Controller
{


    

    public function orderid(Request $request)
    {

     
         $orders = DB::table('orders')->where('order_id', $request->order_id)
   
        ->join('ordertotals','orders.order_id','=','ordertotals.id')
        ->join('checkouts','orders.user_id','=','checkouts.user_id')
        ->join('users','orders.user_id','=','users.id')
        ->join('products','orders.product_id','=','products.id')

        ->get();
  
        return view('admin.quotation.quotationitems', compact('orders'));

        if($orders->order_id === null){
         
          return redirect('error');
       
        
      }
       
      
    }

    public function store(Request $request)
    { 

        
        $quotation = Quotation::create($request->except(['_token']));

     

      return redirect('quotation');
    }

    public function view(Request $request)
    { 

      return view('admin.quotation.viewquotation', ['quotations'=>Quotation::paginate(7)
    ]);
    }
    
    public function destroy($id)
    {
        Quotation::destroy($id);
      
        return back()->with('success_message', 'Quotation has been removed!');
    }

    public function viewquote(Request $request)
    { 

        
      $orders = DB::table('quotations')
      
      ->join('orders','quotations.order_id','=','orders.order_id')
      ->join('products','orders.product_id','=','products.id')
      

       ->select('quotations.*','products.product_name','products.price','orders.quantity')
    

       ->where('quotations.order_id', $request->order_id)
      ->get();
  
  
      return view('admin.quotation.view', compact('orders'));
    }

}
