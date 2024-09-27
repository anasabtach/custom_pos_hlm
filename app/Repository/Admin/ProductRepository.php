<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\ProductInterface;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductInterface
{   
    public $product;

    public function __construct(Product $produict)
    {   
        $this->product = $produict;
    }

    public function getProducts():Collection
    {
        return $this->product->with(['category', 'unit'])->get();
    }

    public function storeProduct(array $arr):Product
    {
        return $this->product->create($arr);
    }

    public function storeProductVariation(Product $product, array $arr):Collection
    {  
        return $product->variations()->createMany($arr);
    }
    
    public function editProduct(string $product_id):Product
    {
        return $this->product->with(['variations'])->findOrFail(hashid_decode($product_id));
    }

    public function updateProduct(array $arr):Product
    {  
        $product = $this->product->findOrFaiL($arr['product_id']);
        $product->update($arr);
        return $product;
    }

    public function deleteProductVariations(Product $product):bool
    {
        return ($product->variations()->exists()) ? $product->variations()->delete() : NULL;
    }
}