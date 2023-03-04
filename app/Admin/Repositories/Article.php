<?php

namespace App\Admin\Repositories;

use App\Models\Article as Model;
use Dcat\Admin\Repositories\EloquentRepository;

/**
 * @property string $content
 */
class Article extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
