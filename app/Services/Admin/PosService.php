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

    // Your service methods here
}