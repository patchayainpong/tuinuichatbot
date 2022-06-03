<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineusereathistory extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table ='lineusereathistory';

    protected $fillable = [
        'id',
        'lineuserid',
        'foodname',
        'calorie',
        'meal',
        'created_at',
        'updated_at',
    ];

}
