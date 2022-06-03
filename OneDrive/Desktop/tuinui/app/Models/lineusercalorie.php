<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineusercalorie extends Model
{
    use HasFactory;
    protected $table ='lineusercalorie';

    protected $fillable = [
        'id',
        'lineuserid',
        'lineuseridcalorie',
        'created_at',
        'updated_at',
        'fat',
        'carbohydrate',
        'protien'
    ];
}
