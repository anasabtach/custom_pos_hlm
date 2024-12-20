<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\CategoryInterface;
use App\Repository\Admin\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService{
    
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryInterface){
        $this->categoryRepository = $categoryInterface;
    }

    public function store(array $data){
        if(isset($data['category_id'])){
            return $this->categoryRepository->update($data);
        }
        $data['slug'] = CommonHelper::generateUniqueSlug($data['category_name'], 'categories');
        return $this->categoryRepository->store($data);
        
    }

    public function getCategories():Collection{
        return $this->categoryRepository->getCategories();
    }

    public function edit($category_id){
        return $this->categoryRepository->edit($category_id);
    }

    public function delete($category_id){
        return $this->categoryRepository->delete($category_id);
    }

    // public function updateList(array $data):bool{
    //     return $this->categoryRepository->updateList($data);
    // }
}