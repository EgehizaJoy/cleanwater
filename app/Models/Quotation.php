<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    
    protected $fillable = ['customer_name','county','address','phone','payment_due',
    'order_id','subtotal','total','terms','archive_status'
        
        ];
}
