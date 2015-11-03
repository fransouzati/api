<?php

namespace Church\Repositories;

use Church\Church;
use Domain\Criteria\Repository;

class ChurchRepository extends Repository
{
    protected $model;

    public function __construct(Church $model)
    {
        $this->model = $model;
    }
}
