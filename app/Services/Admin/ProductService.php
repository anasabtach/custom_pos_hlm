<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\ProductInterface;

class ProductService
{
    protected $repository;

    public function __construct(ProductInterface $repository)
    {
        $this->repository = $repository;
    }

    // Your service methods here
}