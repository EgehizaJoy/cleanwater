<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Session;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function update_qty(Inventory $myStock,Request $request)
    {
     
        $myStock->where('id', $request->id)->update(['quantity' => $request->quantity]);
         
        return back()->with('success_message', 'Quantity updated!');
       
    }


    public function destroy($id)
    {
        Inventory::destroy($id);
      
        return back()->with('success_message', 'Item has been removed!');
    }

}
