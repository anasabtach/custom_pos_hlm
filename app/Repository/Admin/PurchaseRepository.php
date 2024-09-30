<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\PurchaseInterface;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;

class PurchaseRepository implements PurchaseInterface
{
    public function store(array $arr):Purchase
    {   
       return  Purchase::create([
            'slug'          => $arr['slug'],
            'admin_id'      => auth()->id(),
            'supplier_id'   => hashid_decode($arr['supplier_id']),
            'date'          => $arr['date'],
        ]);
    }

    public function storePurchaseItems(Purchase $purchase, array $arr):Collection
    {
        return $purchase->items()->createMany($arr);
    }
}