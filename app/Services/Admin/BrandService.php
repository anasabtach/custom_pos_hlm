<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\BrandInterface;
use App\Repository\Admin\ShopifyBrandRepository;
use App\Repository\Admin\WordPressBrandRepository;
use Illuminate\Database\Eloquent\Collection;

class BrandService{
    
    protected $repository;
    protected $shopifyRepository;
    protected $wordpressRepository;

    public function __construct(BrandInterface $repository,ShopifyBrandRepository $shopifyRepository, WordPressBrandRepository $wordpressRepository){
        $this->repository        = $repository;
        $this->shopifyRepository = $shopifyRepository;
        $this->wordpressRepository = $wordpressRepository;
    }

    public function store(array $data){
        if(isset($data['brand_id'])){
            // CommonHelper::createLog("{$data['brand_name']} updated successfully");
            //$this->shopifyRepository->update($data,$this->edit($data['brand_id'])->shopify_brand_id);//update brand in shopify
            $this->wordpressRepository->update($data,$this->edit($data['brand_id'])->wordpress_brand_id);//update brand in shopify
            return $this->repository->update($data);
        }
        // CommonHelper::createLog("{$data['brand_name']} added successfully");
        $data['slug']             = CommonHelper::generateUniqueSlug($data['brand_name'], 'brands');
        //$data['shopify_brand_id'] = $this->shopifyRepository->store($data);//add brand in shopify
        $data['wordpress_brand_id'] = $this->wordpressRepository->store($data);//add brand in shopify
        return $this->repository->store($data);
        
    }

    public function getBrands():Collection{
        // CommonHelper::createLog("viewed all brands");
        return $this->repository->getBrands();
    }

    public function edit($brand_id){
        return $this->repository->edit($brand_id);
    }

    public function delete($brand_id){
        $this->wordpressRepository->delete($this->edit($brand_id)->wordpress_brand_id);
        return $this->repository->delete($brand_id);
    }
    
    public function remarks($remark, $brand_id){
        return $this->repository->remarks($remark, $brand_id);
    }
}