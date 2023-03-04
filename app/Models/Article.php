<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'created_at'];
    protected $casts    = ['category_id' => 'integer'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
