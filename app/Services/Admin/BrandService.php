<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\BrandInterface;

use Illuminate\Database\Eloquent\Collection;

class BrandService{
    
    protected $repository;

    public function __construct(BrandInterface $repository){
        $this->repository = $repository;
    }

    public function store(array $data){
        if(isset($data['brand_id'])){
            return $this->repository->update($data);
        }
        $data['slug'] = CommonHelper::generateUniqueSlug($data['brand_name'], 'brands');
        return $this->repository->store($data);
        
    }

    public function getBrands():Collection{
        return $this->repository->getBrands();
    }

    public function edit($brand_id){
        return $this->repository->edit($brand_id);
    }

    public function delete($brand_id){
        return $this->repository->delete($brand_id);
    }

    // public function updateList(array $data):bool{
    //     return $this->repository->updateList($data);
    // }
}