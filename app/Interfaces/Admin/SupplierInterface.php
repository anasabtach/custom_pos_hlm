<?php

namespace App\Interfaces\Admin;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Supplier;

interface SupplierInterface
{   
    public function getSuppliers(): Collection;
    
    public function store(array $data): Supplier;

    public function edit(string $supplier_id):Supplier;

    public function delete(string $supplier_id):bool;

    public function update(array $arr):bool;

    public function getCountries():Collection;

    public function suppliersCount():int;
}
