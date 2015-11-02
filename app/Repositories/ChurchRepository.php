<?php

namespace app\Repositories;

use App\Church;
use Exception;

class ChurchRepository
{
    private $model;

    public function __construct(Church $model)
    {
        $this->model = $model;
    }

    /**
     * Get all churches.
     *
     * @param  array  $columns
     *
     * @return Church
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * Store new Church.
     *
     * @param  array  $data
     *
     * @return int|bool
     */
    public function store(array $data)
    {
        try {
            $this->model->fill($data);
            $this->model->save();

            return $this->model;
        } catch (Exception $e) {
            return false;
        }
    }
}
