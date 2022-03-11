<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function invoiceid(Request $request)
    {

        
         $orders = DB::table('orders')
      
        ->join('ordertotals','orders.order_id','=','ordertotals.id')
        ->join('checkouts','orders.user_id','=','checkouts.user_id')
       // ->join('payments','orders.order_id','=','payments.order_id')
        ->join('users','orders.user_id','=','users.id')
        ->join('products','orders.product_id','=','products.id')

         ->select('users.name as user_name','checkouts.county as county','checkouts.town as town',
         'checkouts.road_number as road','checkouts.additional_info as additional_info',
         'orders.order_id as order_id','products.product_name as product_name','products.price as unit_price',
         'orders.quantity as quantity','ordertotals.total as totals',
         'users.phone as phone','orders.id as id')

         ->where('orders.order_id', $request->order_id)
        ->get();
    
    
        return view('admin.invoice.invoiceitems', compact('orders'));
    }
   /* public function invoiceid(Request $request)
    {

    $dbconnect = DB::table('votes')
     ->join('users', 'votes.user_id', '=', 'users.id')
     ->select('votes.id','votes.date_of_birth','votes.voter_ip','votes.flavour', 'users.email')
     ->where('votes.id', $id)
     ->first();

    }*/

    public function store(Request $request)
    { 

        
        $invoice =Invoice::create($request->except(['_token']));

     

      return redirect('invoice');
    }

    public function index(Request $request)
    { 

      return view('admin.invoice.viewinvoice', ['invoices'=>Invoice::paginate(7)
    ]);
    }

    public function destroy($id)
    {
        Invoice::destroy($id);
      
        return back()->with('success_message', 'Invoice has been removed!');
    }

    public function viewinvoice(Request $request)
    { 

        
      $orders = DB::table('invoices')
      
      ->join('orders','invoices.order_id','=','orders.order_id')
      ->join('products','orders.product_id','=','products.id')
      

       ->select('invoices.*','products.product_name','products.price','orders.quantity')
    

       ->where('invoices.order_id', $request->order_id)
      ->get();
  
  
      return view('admin.invoice.view', compact('orders'));
    }

    public function receipt(Request $request)
    { 

        
      $orders = DB::table('invoices')
      
      ->join('orders','invoices.order_id','=','orders.order_id')
      ->join('products','orders.product_id','=','products.id')
      ->join('payments','orders.order_id','=','payments.order_id')
      

       ->select('invoices.*','products.product_name','products.price','orders.quantity',
       'payments.created_at as paid_date','payments.mpesa_trans_id as mpesa_id')
    

       ->where('invoices.order_id', $request->order_id)
      ->get();
  
  
      return view('admin.receipt.view', compact('orders'));
    }
}
