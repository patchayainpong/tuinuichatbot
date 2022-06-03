<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodcutsorder extends Model
{
    use HasFactory;
    protected $table ='productsorder';

    protected $fillable = [
        'id',
        'storeid',
        'productname',
        'note',
        'total',
        'price',
        'customername',
        'customerphone',
        'customeraddress',
        'customerinformation',
        'deliverytype',
        'remember_token',
        'status',
        'orderid'
    ];
}
