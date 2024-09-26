<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\UnitInterface;
use App\Repository\ADmin\UnitRepository;
use Illuminate\Database\Eloquent\Collection;

class UnitService
{
    protected $repository;

    public function __construct(UnitInterface $repository){
        $this->repository = $repository;
    }

    public function store(array $data){
        if(isset($data['unit_id'])){
            return $this->repository->update($data);
        }
        return $this->repository->store($data);
        
    }

    public function getUnits():Collection{
        return $this->repository->getUnits();
    }

    public function edit($unit_id){
        return $this->repository->edit($unit_id);
    }

    public function delete($unit_id){
        return $this->repository->delete($unit_id);
    }
}