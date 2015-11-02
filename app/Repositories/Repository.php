<?php

namespace app\Repositories;

class Repository
{
    public $limit = 50;

    public function response()
    {
        return $this->model->paginate($this->limit);
    }
}
