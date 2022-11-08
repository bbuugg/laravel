<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'chapter_id', 'content'];
    protected $casts    = [
        'lesson_id'  => 'integer',
        'chapter_id' => 'integer',
    ];
}
