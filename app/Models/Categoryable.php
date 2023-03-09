<?php

namespace App\Models;

class Categoryable extends Model
{
    protected $fillable = [
        'category_id',
        'categoryable_type',
        'categoryable_id'
    ];
}
