<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
Use Session;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller


{

    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();


          if ($user === null) {

            Alert::warning('warning', 'Username or password is incorrect');

            return back();
          } 
        if($user->admin_level === 1) {

          if(!$user || !Hash::check($req->password,$user->password))
          {
            Alert::warning('warning', 'Username or password is incorrect');

              return back();
          }
          else{
              $req->session()->put('user',$user);
              return redirect()->intended('dashboard');
          }
           

            //
         }
          
        

         if($user->admin_level === 'null') {
            $req->session()->put('user',$user);
            return redirect('product');
  
            //
         }



        if(!$user || !Hash::check($req->password,$user->password))
        {
          Alert::warning('warning', 'Username or password is incorrect');

            return back();
        }
        else{
            $req->session()->put('user',$user);
            return redirect()->back();
        }
    }

    
    function register(Request $req)


    {
       
       //   return $req->input();
       $user = new User;

       $user->name=$req->name;
       $user->email=$req->email;
       $user->phone=$req->phone;
      $user->password=Hash::make ($req->password);
       $user->save();
       
       Alert::success('Congrats', 'You\'ve Successfully Registered');

      return redirect()->back();
   

    }
}
