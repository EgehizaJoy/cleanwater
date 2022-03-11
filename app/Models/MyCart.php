<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;
    protected $table='carts';


    
    protected $fillable = ['user_id','quantity','product_id',];
}
