<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\BrandInterface;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandRepository implements BrandInterface
{
    public $brand;
    
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;    
    }
    public function store(array $data): Brand
    {       
        return $this->brand->create([
            'admin_id'   => auth()->id(),
            'slug'      => $data['slug'],
            'name'      => $data['brand_name'],
        ]);
    }

    public function getBrands(): Collection
    {
        return $this->brand->get();
    }

    public function edit(string $brand_id):Brand
    {   
        return $this->brand->findOrFail(hashid_decode($brand_id));
    }

    public function update(array $arr):bool
    {   
        return $this->brand->findOrFail(hashid_decode($arr['brand_id']))->update([
            'name'  => $arr['brand_name'],
        ]);
    }

    public function delete(string $brand_id):bool
    {
        return $this->brand->destroy(hashid_decode($brand_id));
    }

    // public function updateList(array $data):bool
    // {   
    //     return DB::transaction(function () use ($data):bool {
    //         collect($data)->each(function ($item) {
    //             $this->brand->findOrFail($item['id'])->update([
    //                 'parent_id' => $item['parent_id'] ?? NULL,
    //                 'order_by' => $item['order'] ?? 0
    //             ]);
    //         });
    //         return true;
    //     });
    // }
}
