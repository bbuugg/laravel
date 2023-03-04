<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $name
 */
class Category extends Model
{
    use HasDateTimeFormatter;

    protected $fillable = ['name', 'parent_id'];
    protected $casts    = ['parent_id' => 'integer'];
}
