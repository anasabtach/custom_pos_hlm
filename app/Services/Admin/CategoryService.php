<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\CategoryInterface;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\ShopifyCategoryRepository;
use App\Repository\Admin\WordPressCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService{
    
    protected $categoryRepository;
    protected $shopifyRepository;
    protected $wordpressRepository;
    
    public function __construct(CategoryInterface $categoryInterface, ShopifyCategoryRepository $shopifyRepository, WordPressCategoryRepository $wordpressRepository){
        $this->categoryRepository = $categoryInterface;
        $this->shopifyRepository  = $shopifyRepository;
        $this->wordpressRepository= $wordpressRepository;
    }

    public function store(array $data){
        // dd($this->edit($data['category_id'])->wordpress_id);
        if(isset($data['category_id'])){
            $this->wordpressRepository->update($data, $this->edit($data['category_id'])->wordpress_id);
            // $this->shopifyRepository->update($data, $this->edit($data['category_id'])->shopify_id);
            return $this->categoryRepository->update($data);
        }
        // $data['shopify_id'] = $this->shopifyRepository->store($data);
        $data['slug'] = CommonHelper::generateUniqueSlug($data['category_name'], 'categories');
        $data['wordpress_id'] = $this->wordpressRepository->store($data);
        return $this->categoryRepository->store($data);
        //return $this->wordpressRepository->store($data);
        
    }

    public function getCategories():Collection{
        return $this->categoryRepository->getCategories();
    }

    public function edit($category_id){
        return $this->categoryRepository->edit($category_id);
    }

    public function delete($category_id){
        $this->wordpressRepository->delete($this->edit($category_id)->wordpress_id);
        return $this->categoryRepository->delete($category_id);
    }

    // public function updateList(array $data):bool{
    //     return $this->categoryRepository->updateList($data);
    // }

    public function remarks($remark, $category_id){
        return $this->categoryRepository->remarks($remark, $category_id);
    }
}