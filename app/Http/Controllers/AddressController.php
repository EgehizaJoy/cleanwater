<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;

use App\Models\Checkout;

class AddressController extends Controller
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
    public function store(Request $request)
    {
  
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $request->validate([
            'user_id'           => 'required',
            'fname'           => 'required',
            'lname'           => 'required',
            'phone'           => 'required',
            'email'           => 'required',
            'delivery_type'           => 'required',
            'county'           => 'required',
            'town'           => 'required',
            'road_number'           => 'required',
            'additional_info'           => 'required',
           
        ]);

       Checkout::create([
           'user_id'          => $request->user_id,
           'fname'         => $request->fname,
           'lname'       => $request->lname,
           'phone' => $request->phone,
           'email'       => $request->email,
           'delivery_type'       => $request->delivery_type,
           'county'       => $request->county,
           'town'       => $request->town,
           'road_number'       => $request->road_number,
           'additional_info'       => $request->additional_info,
         
       ]);

     //  return response()->json([ 'success'=> 'Form is successfully submitted!']);

     dd($request->all());
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
