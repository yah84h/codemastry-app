<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id',
        'price',
        'tax',
        'total',
        'desc',
        'net',
        'user_id',
    ];
}


     