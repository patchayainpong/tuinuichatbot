<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';

    protected $fillable = [
        'storeid',
        'productname',
        'calorie',
        'productdetail',
        'promotion',
        'product_img',
        'price',
        'protien',
        'carbohydrate',
        'fat',
        'meat',
        'rice',
        'oil',
        
    ];

}
