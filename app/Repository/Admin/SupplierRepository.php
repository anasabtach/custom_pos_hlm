<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\SupplierInterface;
use App\Models\Brand;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository implements SupplierInterface
{
    public $supplier;
    
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;    
    }
    public function store(array $data): Brand
    {       
        return $this->supplier->create([
            'admin_id'   => auth()->id(),
            'slug'      => $data['slug'],
            'name'      => $data['brand_name'],
        ]);
    }

    public function getSuppliers(): Collection
    {
        return $this->supplier->get();
    }

    public function edit(string $supplier_id):Brand
    {   
        return $this->supplier->findOrFail(hashid_decode($supplier_id));
    }

    public function update(array $arr):bool
    {   
        return $this->supplier->findOrFail(hashid_decode($arr['brand_id']))->update([
            'name'  => $arr['brand_name'],
        ]);
    }

    public function delete(string $supplier_id):bool
    {
        return $this->supplier->destroy(hashid_decode($supplier_id));
    }
}
