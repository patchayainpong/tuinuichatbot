<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreHistory extends Model
{
    use HasFactory;
    protected $table ='storeorderhistory';

    protected $fillable = [
        'id',
        'orderid',
        'productname',
        'price',
        'promotion',
        'total',
        'created_at',
    ];
}
