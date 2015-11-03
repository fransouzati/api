<?php

namespace Church\Services;

use Church\Address;
use Church\Repositories\ChurchRepository;
use Domain\Criteria\Service;
use Exception;

class ChurchStoreService extends Service
{
    /**
     * @var ChurchRepository
     */
    private $repo;

    /**
     * @param ChurchRepository $repo
     */
    public function __construct(ChurchRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Store new church.
     *
     * @param  array  $data
     */
    public function store(array $data)
    {
        if (!isset($data['addresses']) || !is_array($data['addresses'])) {
            $this->setError('Endereço é obrigatório!');

            return;
        }

        $church = $this->repo->store($data);

        if (!$church) {
            $this->setError('Erro ao tentar salvar igreja.');

            return;
        }

        $addresses = $data['addresses'];

        foreach ($addresses as $row) {
            try {
                $address = new Address;
                $address->church_id = (int) $church->id;
                $address->fill($row);
                $church->addresses()->save($address);
            } catch (Exception $e) {
                $this->setError('Um ou mais endereços é inválido.');
                $this->repo->forceDelete($church->id);
            }
        }

        return $this;
    }
}
