<?php

namespace App\Interfaces\Admin;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;

interface PurchaseInterface
{   
    public function getPurchases():Collection;

    public function store(array $arr):Purchase;

    public function storePurchaseItems(Purchase $purchase, array $arr):Collection;
    
    public function details(string $product_id):Purchase;

    public function edit(string $purchase_id):Purchase;

    public function update(array $arr):Purchase;

    public function deletePurchaseItems(Purchase $purchase):bool;

    public function delete(string $purchase_id):bool;

    public function purchaseCount():int;

    public function remarks($remarks, $purchase_id):bool;

}