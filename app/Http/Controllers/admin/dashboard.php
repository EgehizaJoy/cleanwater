<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\Payment;

class dashboard extends Controller
{
    public function dashboard(){

    	return view('admin.summaries')->with([
            'invoices' =>Invoice::all(),
            'users' =>User::all(),
            'orders' =>Order::all(),
            'quotations' =>Quotation::all(),
            'payments' =>Payment::all(),
        ]);
    }


   
}
