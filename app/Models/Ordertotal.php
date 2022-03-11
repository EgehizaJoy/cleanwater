<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordertotal extends Model
{
    use HasFactory;

    protected $table='ordertotals';

    protected $fillable = ['user_id','total'
        
];
}
