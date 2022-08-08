<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;

    protected $fillable = [
        'students_id',
        'term',
        'maths',
        'science',
        'history',
        'total_marks',
    ];

    
}
