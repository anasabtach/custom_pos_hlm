<?php

namespace App\Interfaces\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryInterface
{   
    public function getCategories(): Collection;
    
    public function store(array $data): Category;

    public function updateList(array $data):bool;
}
