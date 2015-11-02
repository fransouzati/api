<?php

namespace app\Repositories;

use App\Church;
use App\Repositories\Repository;
use Exception;

class ChurchRepository extends Repository
{
    protected $model;

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
    public function all(array $columns = ['*'], array $with = [])
    {
        return $this->model->select($columns)->with($with)->get();

        return $this->response();
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

            return $this->response();
        } catch (Exception $e) {
            return false;
        }
    }
}
