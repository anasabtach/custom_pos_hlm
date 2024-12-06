<?php

namespace App\Interfaces\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryInterface
{   
    public function getCategories(): Collection;
    
    public function store(array $data): Category;

    public function edit(string $category_id):Category;

    public function delete(string $category_id):bool;

    public function update(array $arr):bool;

    public function categoriesCount():int;

    public function remarks($remarks, $category_id):bool;

    // public function updateList(array $data):bool;
}
