<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class netflix extends Model
{
    use HasFactory;

    protected $table ='netflix';

    protected $fillable = [
        'id',
        'name',
        'detail',
        'slipimg',
        'type',
        'created_at',
        'updated_at',
    ];
}
