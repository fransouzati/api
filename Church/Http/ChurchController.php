<?php

namespace Church\Http;

use App\Http\Controllers\Controller;
use Church\Http\Requests\ChurchStoreRequest;
use Church\Repositories\ChurchRepository;
use Church\Services\ChurchStoreService;

class ChurchController extends Controller
{
    private $repo;
    private $create;
    private $with = ['addresses', 'events', 'worship'];

    /**
     * @param ChurchRepository $repo
     */
    public function __construct(ChurchRepository $repo, ChurchStoreService $create)
    {
        $this->repo = $repo;
        $this->create = $create;
    }

    /**
     * Get all churches.
     *
     * @return ChurchRepository
     */
    public function all()
    {
        $churches = $this->repo->all(['*'], $this->with);

        return $this->response($churches);
    }

    public function get($id)
    {
        $church = $this->repo->find($id, ['*'], $this->with);

        if ($church->count() < 1) {
            return $this->response('Failed', false);
        }

        return $this->response($church);
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
        $church = $this->create->store($request->all());

        if ($church->fails()) {
            return $this->response($church->errors(), false);
        }

        return $this->response($church);
    }
}
