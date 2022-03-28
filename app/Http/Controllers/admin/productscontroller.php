<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use Illuminate\Support\Facades\File;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Discount;
use App\Models\Category;

class productscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', ['products'=>Product::paginate(7)
    ]);
    }

    public function view_stock()
    {
        return view('admin.products.stock', ['stocks'=>Inventory::paginate(7)
    ]);
    }

    function stock(Request $req)

    {
       $stock = new Inventory;

       $stock->name=$req->name;
       $stock->quantity=$req->quantity;
       $stock->product_id=$req->product_id;
      
       $stock->save();
       
      return back()->with('success_message', 'Quantity added!');
   

    }

    function discount(Request $req)

    {
       $discount = new Discount;

       $discount->name=$req->name;
       $discount->decsription=$req->decsription;
       $discount->discount=$req->discount;
      
       $discount->save();
       
      return back()->with('success','Data Saved');
   

    }

    function category(Request $req)

    {
       $category = new Category;

       $category->name=$req->name;
       $category->decsription=$req->decsription;
       
      
       $category->save();
       
      return back()->with('success','Data Saved');
   

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
        
        $product = Product::create($request->all());
         
    
        if ($request->hasFile('image')) {
         $request->file('image')->store('public/images');
         
         // ensure every image has a different name
         $file_name = $request->file('image')->hashName();
         
         // save new image $file_name to database
         $product->update(['image' => $file_name]);
     }
     
      //  $user->roles()->sync($request->roles);
      //  $request->session()->flash('success','you created the user');
 
      return redirect()->back()->with('success_message', 'Item has been added!');;
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
        Product::destroy($id);
      
        return back()->with('success_message', 'Product has been removed!');
    }
}
