<?php

namespace App\Admin\Repositories;

use App\Models\Section as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Section extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
