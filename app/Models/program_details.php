<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'price',
        'purch',
        'lesson',
        'duration',
        'program_id',
    ];
}
