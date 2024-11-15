<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\AuthInterface;
use App\Interfaces\Admin\CategoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryInterface
{
    public $category;
    
    public function __construct(Category $category)
    {
        $this->category = $category;    
    }
    public function store(array $data): Category
    {   
        return $this->category->create([
            'admin_id'   => auth()->id(),
            'slug'      => $data['slug'],
            'name'      => $data['category_name'],
        ]);
    }

    public function getCategories(): Collection
    {
        return $this->category->whereNull('parent_id')->latest()->get();
    }

    public function edit(string $category_id):Category
    {
        return $this->category->findOrFail(hashid_decode($category_id));
    }

    public function update(array $arr):bool
    {
        return $this->category->findOrFail(hashid_decode($arr['category_id']))->update([
            'name'  => $arr['category_name'],
        ]);
    }

    public function delete(string $category_id):bool
    {
        return $this->category->destroy(hashid_decode($category_id));
    }

    // public function updateList(array $data):bool
    // {   
    //     return DB::transaction(function () use ($data):bool {
    //         collect($data)->each(function ($item) {
    //             $this->category->findOrFail($item['id'])->update([
    //                 'parent_id' => $item['parent_id'] ?? NULL,
    //                 'order_by' => $item['order'] ?? 0
    //             ]);
    //         });
    //         return true;
    //     });
    // }

    public function categoriesCount():int
    {
        return $this->category->count();
    }
}
