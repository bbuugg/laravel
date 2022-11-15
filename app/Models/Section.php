<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'chapter_id', 'content'];
    protected $casts    = [
        'lesson_id'  => 'integer',
        'chapter_id' => 'integer',
    ];

    public const TYPE_HTML = 0;
    public const TYPE_EXAM = 1;
}
