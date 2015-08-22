<?php
/**
 * Created by PhpStorm.
 * User: deyves-dev
 * Date: 21/08/15
 * Time: 21:15
 */

namespace App\Services;


use App\Repositories\ClientRepository;

class ClientService
{
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }


    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        $this->repository->update($data,$id);
    }



}