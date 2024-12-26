<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\LogInterface;

class LogService
{
    protected $repository;

    public function __construct(LogInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getLogs(){
        return $this->repository->getLogs();
    }
}