<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected function answers(): HasMany
    {
        return $this->hasMany(QuestionAnswer::class);
    }
}
