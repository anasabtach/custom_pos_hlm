<?php

namespace App\Services\Admin;

use App\Repository\Admin\PosRepository;

class PosService
{
    protected $repository;

    public function __construct(PosRepository $repository)
    {
        $this->repository = $repository;
    }

    public function bill($sale_id){
        return $this->repository->bill($sale_id);
    }
}