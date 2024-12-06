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

    public function store(array $data)
    {
        $supplier = isset($data['supplier_id']) ? $this->repository->update($data) : $this->repository->store($data);
    
        $this->offeredProductsAttachmentAndDeattachment(
            $data['supplier_id'] ?? $supplier->hashid, 
            $data['product_ids']
        );
    
        return $supplier;
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

    public function remarks($remark, $supplier_id){
        return $this->repository->remarks($remark, $supplier_id);
    }

    public function offeredProductsAttachmentAndDeattachment($supplier_id, $product_ids){
       $supplier = $this->edit($supplier_id);
       $supplier->offeredProducts()->detach();//detach all the products
       $supplier->offeredProducts()->attach(array_map("hashid_decode", $product_ids));//attach all the products to supplier
    }
}