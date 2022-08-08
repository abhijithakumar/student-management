<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
    ];

    public function marks()
    {
        return $this->hasOne(Marks::class);
    }
}
