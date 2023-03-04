<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int    $id
 * @property string $name
 */
class Category extends Model
{
    use HasDateTimeFormatter, ModelTree;

    protected $fillable = ['title', 'parent_id'];
    protected $casts    = ['parent_id' => 'integer'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
