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

    public function store(array $data): Category
    {
        return Category::create($data);
    }

    public function getCategories(): Collection
    {
        return Category::with(['subCategories'])->whereNull('parent_id')->get();
    }

    public function updateList(array $data):bool
    {   
        return DB::transaction(function () use ($data):bool {
            collect($data)->each(function ($item) {
                Category::findOrFail($item['id'])->update([
                    'parent_id' => $item['parent_id'] ?? NULL,
                    'order_by' => $item['order'] ?? 0
                ]);
            });
            return true;
        });
    }
}
