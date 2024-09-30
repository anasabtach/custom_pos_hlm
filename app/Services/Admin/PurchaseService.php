<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\PurchaseInterface;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    protected $repository;

    public function __construct(PurchaseInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store($arr){
        DB::transaction(function() use ($arr){
            $slug              = CommonHelper::generateId('purchases', 'slug');
            $arr['slug']       = $slug;
            $purchase          = $this->repository->store($arr);//store purchase
            $purchase_item_arr = $this->createPurchaseItemArr($arr);//create purchase item array
            $this->repository->storePurchaseItems($purchase, $purchase_item_arr);//store purchase item array
        });
    }

    public function createPurchaseItemArr($arr){//create purchase item array
       $purchase_item_arr = [];
        foreach($arr['product_id'] AS $key=>$product){
            $purchase_item_arr[] = [
                'product_id'              => hashid_decode($arr['product_id'][$key]),
                'product_variation_id'    => (isset($arr['product_variation_id'][$key])) ? hashid_decode($arr['product_variation_id'][$key]) : NULL,
                'cost'                    => (int) $arr['cost'][$key],
                // 'price'                   => (int) $arr['price'][$key],
                'qty'                     => (int) $arr['qty'][$key],
                'total'                   => (int) $arr['cost'][$key] * (int) $arr['qty'][$key],
                'expiration'              => (isset($arr['expiration'][$key])) ? $arr['expiration'][$key] : NULL,
            ];
       }
       return $purchase_item_arr;
    }
}