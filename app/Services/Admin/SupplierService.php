<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\SupplierInterface;

use Illuminate\Database\Eloquent\Collection;

class SupplierService{
    
    protected $repository;

    public function getSuppliers():Collection{
        return $this->repository->getSuppliers();
    }

    public function __construct(SupplierInterface $repository){
        $this->repository = $repository;
    }

    public function store(array $data){
        if(isset($data['brand_id'])){
            return $this->repository->update($data);
        }
        $data['slug'] = CommonHelper::generateUniqueSlug($data['brand_name'], 'brands');
        return $this->repository->store($data);
        
    }

    public function edit($brand_id){
        return $this->repository->edit($brand_id);
    }

    public function delete($brand_id){
        return $this->repository->delete($brand_id);
    }
}