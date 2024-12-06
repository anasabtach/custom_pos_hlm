<?php

namespace App\Interfaces\Admin;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

interface CustomerInterface
{   
    public function getCustomers(): Collection;
    
    public function store(array $data): Customer;

    public function edit(string $supplier_id):Customer;

    public function delete(string $supplier_id):bool;

    public function update(array $arr):bool;

    public function getCountries():Collection;

    public function customersCount():int;

    public function customerGrowthChart();

    public function remarks($remarks, $customer_id):bool;



}
