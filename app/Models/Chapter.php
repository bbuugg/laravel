<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property Lesson $lesson
 * @property string $title
 */
class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'title'];
    protected $casts    = [
        'lesson_id' => 'integer',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
