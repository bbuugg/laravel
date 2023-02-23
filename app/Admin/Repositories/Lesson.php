<?php

namespace App\Admin\Repositories;

use App\Models\Lesson as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Lesson extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
