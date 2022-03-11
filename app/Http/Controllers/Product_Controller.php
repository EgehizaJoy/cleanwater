<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use Illuminate\Support\Facades\File;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Product;
use App\Models\Inventory;

class Product_Controller extends Controller
{
    /*public function index()
    {

		return view('/products')->with([
			'products' => Product::paginate(8),
		]);
      
    }*/

    function index()
    {

    
      $products= DB::table('inventories')

       ->join('products','inventories.product_id','=','products.id')
    
      ->select('products.*','inventories.quantity as qty')
     
      ->paginate(8);
    
   
       return view('/products',['products'=>$products]);
       
    }


    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data])
        ->with([
            'products' =>Product::paginate(4),
           
        ]);
        ;
    }
}
