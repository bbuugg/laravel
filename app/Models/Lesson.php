<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * @property int    $id
 * @property string $title
 * @property string $cover
 */
class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'mode'];
    protected $casts    = ['mode' => 'integer'];

    /**
     * 章
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}
