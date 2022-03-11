<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    
    protected $table='checkouts';
    protected $guarded = [''];
   // protected $fillable = ['user_id','fname','lname','phone','email','delivery_type','county','town',
    //'road_number','additional_info',
        
    //];
}
