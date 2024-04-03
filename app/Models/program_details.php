<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Details extends Model
{
    use HasFactory;
    protected $table= 'program_details';
    protected $fillable = [
        'description',
        'price',
        'purch',
        'lesson',
        'duration',
        'program_id',
        'section_id',
        'url_image'
    ];
}
