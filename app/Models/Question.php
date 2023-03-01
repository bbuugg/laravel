<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = ['uuid', 'content', 'type'];
    protected $casts    = ['type' => 'integer'];
    protected $hidden   = ['id'];

    public const TYPE_TEXT  = 0;
    public const TYPE_IMAGE = 1;
    public const TYPE_HTML  = 2;

    public function answers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class)->oldest('order')->oldest('id');
    }
}
