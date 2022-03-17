<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    //protected $table='payments';
    //protected $fillable = ['mpesa_trans_id','amount','phone','order_id','user_id','total'];
    protected $table='paypal';

}
