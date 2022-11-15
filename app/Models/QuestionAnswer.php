<?php

namespace App\Models;

class QuestionAnswer extends Model
{
    protected $fillable = ['question_id', 'is_correct', 'content', 'order'];
    protected $casts    = ['question_id' => 'integer', 'order' => 'integer', 'is_correct' => 'boolean'];
    protected $hidden   = ['id', 'question_id'];
}
