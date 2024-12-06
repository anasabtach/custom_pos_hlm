<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\ProductInterface;
use App\Interfaces\Admin\PurchaseInterface;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    protected $repository;
    protected $productRepository;

    public function __construct(PurchaseInterface $repository, ProductInterface $product)
    {
        $this->repository        = $repository;
        $this->productRepository = $product;
    }

    public function getPurchases(){
        return $this->repository->getPurchases();
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
        
            $this->productRepository->updateProductStock($arr['product_id'][$key], $arr['qty'][$key], 'increment');


            $product_id = $this->productRepository->getSingleProduct($product);//get product
            $product_variation_id =  (isset($arr['product_variation_id'][$key])) 
                                        ? $product_id->variations->where('id', hashid_decode($arr['product_variation_id'][$key]))->first() 
                                        : NULL;//get variation if exists
            
            $purchase_item_arr[] = [
                'product_id'              => hashid_decode($arr['product_id'][$key]),
                'product_variation_id'    => $product_variation_id->id ?? null,
                'cost'                    => (int) $arr['cost'][$key],
                'price'                   => (int) (is_null($product_variation_id)) ? $product_id->price : $product_variation_id->price,//if variation is set then get the variuation price
                'qty'                     => (int) $arr['qty'][$key],
                'total'                   => (int) $arr['cost'][$key] * (int) $arr['qty'][$key],
                'expiration'              => (isset($arr['expiration'][$key])) ? $arr['expiration'][$key] : NULL,
            ];
       }
       return $purchase_item_arr;
    }

    public function details($purchase_id){
        return $this->repository->details($purchase_id);
    }

    public function edit($purchase_id){
        return $this->repository->edit($purchase_id);   
    }

    public function update($arr){
        DB::transaction(function() use ($arr){
            $purchase          = $this->repository->update($arr);//store purchase
            $purchase_item_arr = $this->createPurchaseItemArr($arr);//create purchase item array
            $this->repository->deletePurchaseItems($purchase);
            $this->repository->storePurchaseItems($purchase, $purchase_item_arr);//store purchase item array
        });
    }

    public function delete($purchase_id){
        return $this->repository->delete($purchase_id);
    }

    // public function updateProductStock($product_id, $stock, $type):bool
    // {
    //     return $this->repository->updateProductStock($product_id, $stock, $type);
    // }

    public function remarks($remark, $purchase_id){
        return $this->repository->remarks($remark, $purchase_id);
    }
}