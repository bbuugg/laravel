<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'mode'];
    protected $casts    = ['mode' => 'integer'];

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
}
