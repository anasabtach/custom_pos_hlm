<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\ColorInterface;
// use App\Repository\Admin\ShopifyBrandRepository;
use Illuminate\Database\Eloquent\Collection;

class ColorService{
    
    protected $repository;
    // protected $shopifyRepository;

    public function __construct(ColorInterface $repository){
        $this->repository        = $repository;
        // $this->shopifyRepository = $shopifyRepository;
    }

    public function store(array $data){
        if(isset($data['color_id'])){
            // $this->shopifyRepository->update($data,$this->edit($data['color_id'])->shopify_color_id);//update brand in shopify
            return $this->repository->update($data);
        }
        // $data['slug']             = CommonHelper::generateUniqueSlug($data['brand_name'], 'brands');
        // $data['shopify_color_id'] = $this->shopifyRepository->store($data);//add brand in shopify
        return $this->repository->store($data);
        
    }

    public function getColors():Collection{
        return $this->repository->getColors();
    }

    public function edit($color_id){
        return $this->repository->edit($color_id);
    }

    public function delete($color_id){
        return $this->repository->delete($color_id);
    }
    
    public function remarks($remark, $color_id){
        return $this->repository->remarks($remark, $color_id);
    }
}