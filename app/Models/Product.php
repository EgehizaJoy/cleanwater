<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    protected $fillable = ['product_name','extra_detail','water-type',
    'capacity','water-source','image','description','category_id','inventory_id','price','discount_id',
     'nutrients','vitamins','minerals'];

   
}
