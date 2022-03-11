<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Welcome;
use App\Models\Additional;
use App\Models\Product;
use App\Models\Services;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/welcome')->with([
			'welcomes' => Welcome::all(),
			//'additional' => Additional::all(),
			'products'=>Product::paginate(4),
			//'services'=>Services::all(),
			
	]);
    }

    public function getWelcome()
	{
		return view('admin.welcome.index')->with([
			'welcomes'=>Welcome::all(),
		]);
		
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
        $welcome = new Welcome;
		$welcome->header = $request->input('header');
		$welcome->life = $request->input('life');
		$welcome->description = $request->input('description');
		
		if($request->hasFile('image')){
			
			$file = $request->file('image');
			$extention = $file->getClientOriginalExtension();
			$filename = time().'.'.$extention;
			$file->move('image/welcome/',$filename);
			$welcome->image = $filename;
		}
		
		$welcome->save();
		return redirect()->back()->with('status','Item Saved');
		
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
        //
    }
}
