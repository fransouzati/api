<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChurchStoreRequest;
use App\Repositories\ChurchRepository;

class ChurchController extends Controller
{
    private $repo;

    /**
     * @param ChurchRepository $repo
     */
    public function __construct(ChurchRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Get all churches.
     *
     * @return ChurchRepository
     */
    public function all()
    {
        $this->repo->all();
    }

    /**
     * Store new chruch.
     *
     * @param  ChurchStoreRequest $request
     *
     * @return response
     */
    public function store(ChurchStoreRequest $request)
    {
        $church = $this->repo->store($request->all());

        if (!$church) {
            return $this->response('Failed', false);
        }

        return $this->response($church);
    }
}
