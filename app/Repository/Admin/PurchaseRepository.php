<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\PurchaseInterface;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;

class PurchaseRepository implements PurchaseInterface
{   
    public function getPurchases():Collection
    {
        return Purchase::with(['supplier'])->latest()->get();
    }

    public function store(array $arr):Purchase
    {   
       return  Purchase::create([
            'slug'          => $arr['slug'],
            'batch_no'      => $arr['batch_no'],
            'admin_id'      => auth()->id(),
            'supplier_id'   => hashid_decode($arr['supplier_id']),
            'date'          => $arr['date'],
        ]);
    }

    public function storePurchaseItems(Purchase $purchase, array $arr):Collection
    {
        return $purchase->items()->createMany($arr);
    }

    public function details(string $purchase_id):Purchase
    {
        return Purchase::with(['supplier', 'items.product.unit'])->findOrFail(hashid_decode($purchase_id));
    }

    public function edit(string $purchase_id):Purchase
    {
        return Purchase::with('items')->findOrFail(hashid_decode($purchase_id));
    }

    public function update(array $arr):Purchase
    {   
       $purchase =   Purchase::findOrFail(hashid_decode($arr['purchase_id']));
       $purchase->update(
        [
            'admin_id'      => auth()->id(),
            'supplier_id'   => hashid_decode($arr['supplier_id']),
            'date'          => $arr['date'],
        ]
       );
       return $purchase;
    }

    public function deletePurchaseItems(Purchase $purchase):bool
    {
        return $purchase->items()->delete();
    }

    public function delete(string $purchase_id):bool
    {
        return Purchase::destroy(hashid_decode($purchase_id));
    }

    public function purchaseCount():int
    {
        return Purchase::count();
    }

    public function remarks($remarks, $purchase_id):bool
    {
        return Purchase::where('id', hashid_decode($purchase_id))->update(['remarks'=>$remarks]);
    }


}