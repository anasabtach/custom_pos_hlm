<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\SupplierInterface;

use Illuminate\Database\Eloquent\Collection;

class SupplierService{
    
    protected $repository;

    public function __construct(SupplierInterface $repository){
        $this->repository = $repository;
    }

    public function getSuppliers():Collection{
        return $this->repository->getSuppliers();
    }

    public function store(array $data){
        return (isset($data['supplier_id'])) ? $this->repository->update($data) : $this->repository->store($data);
    }

    public function edit($supplier_id){
        return $this->repository->edit($supplier_id);
    }

    public function delete($supplier_id){
        return $this->repository->delete($supplier_id);
    }

    public function getCountries(){
        return $this->repository->getCountries();
    }
}