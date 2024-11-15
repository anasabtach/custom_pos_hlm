<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\BrandInterface;
use App\Repository\Admin\ShopifyBrandRepository;
use Illuminate\Database\Eloquent\Collection;

class BrandService{
    
    protected $repository;
    protected $shopifyRepository;

    public function __construct(BrandInterface $repository,ShopifyBrandRepository $shopifyRepository){
        $this->repository        = $repository;
        $this->shopifyRepository = $shopifyRepository;
    }

    public function store(array $data){
        if(isset($data['brand_id'])){
            $this->shopifyRepository->update($data,$this->edit($data['brand_id'])->shopify_brand_id);//update brand in shopify
            return $this->repository->update($data);
        }
        $data['slug']             = CommonHelper::generateUniqueSlug($data['brand_name'], 'brands');
        $data['shopify_brand_id'] = $this->shopifyRepository->store($data);//add brand in shopify
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
}