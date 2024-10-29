<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\SaleInterface;

class SaleService
{
    protected $repository;

    public function __construct(SaleInterface $repository)
    {
        $this->repository = $repository;
    }

    public function saleDetail($id){
        return $this->repository->saleDetail($id);
    }
}