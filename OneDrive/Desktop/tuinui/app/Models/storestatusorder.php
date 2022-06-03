<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storestatusorder extends Model
{
    use HasFactory;

    protected $table ='orderstatus';

    protected $fillable = [
        'id',
        'storeid',
        'orderid',
        'status',
        'totalprice',
        'note',
        'customername',
        'customerphone',
        'customeraddress',
        'customerinformation',
        'deliverytype',
        'created_at',
        'updated_at',
    ];

}
