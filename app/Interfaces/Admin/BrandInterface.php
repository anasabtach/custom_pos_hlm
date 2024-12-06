<?php

namespace App\Interfaces\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface BrandInterface
{   
    public function getBrands(): Collection;
    
    public function store(array $data): Brand;

    public function edit(string $category_id):Brand;

    public function delete(string $category_id):bool;

    public function update(array $arr):bool;
    
    public function brandsCount():int;

    public function remarks($remarks, $brand_id):bool;
}
