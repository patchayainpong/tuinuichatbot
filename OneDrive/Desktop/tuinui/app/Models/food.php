<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;
    protected $table ='food';

    protected $fillable = [
        'id',
        'foodname',
        'detailfood	',
        'calorie',
        'foodimg',
        'created_at',
        'updated_at',
    ];
}
