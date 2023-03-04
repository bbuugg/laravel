<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionAnswer extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'question_answers';

    protected function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
