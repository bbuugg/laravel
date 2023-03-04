<?php

namespace App\Admin\Repositories;

use App\Models\Question as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Question extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
