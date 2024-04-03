<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id',
        'program_name',
        'price',
        'tax',
        'total',
        'desc',
        'net',
        'user_id',
        'user_name',
    ];
}
