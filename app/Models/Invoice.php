<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name','county','address','phone','paid_date','delivery_date',
    'order_id','subtotal','tax','total','mpesa_id','terms','archive_status'
        
        ];
}
