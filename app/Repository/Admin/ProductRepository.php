<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\ProductInterface;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class ProductRepository implements ProductInterface
{   
    public $product;

    public function __construct(Product $produict)
    {   
        $this->product = $produict;
    }

    public function getProducts():Collection
    {
        return $this->product->with(['category', 'unit', 'brand', 'supplier:id,name'])->withTrashed()->latest()->withLog()->get();
    }

    public function getDeletedProdcuts():Collection
    {
        return $this->product->with(['category', 'unit', 'brand'])->onlyTrashed()->get();
    }

    public function storeProduct(array $arr):Product
    {   
        return $this->product->create($arr);
    }

    public function storeProductVariation(Product $product, array $arr): void
    {
        foreach ($arr as $variation) {
            if (isset($variation['id']) && !empty($variation['id'])) {
                // Update the existing variation
                $product->variations()->updateOrCreate(
                    ['id' => $variation['id']],
                    $variation
                );
            } else {
                // Create a new variation
                $product->variations()->create($variation);
            }
        }
    }
    
    public function editProduct(string $product_id):Product
    {
        return $this->product->with(['variations'])->withTrashed()->findOrFail(hashid_decode($product_id));
    }

    public function delete(string $product_id):bool
    {   
        return $this->product->destroy(hashid_decode($product_id));
    }

    public function updateProduct(array $arr):Product
    {   
        $product = $this->product->withTrashed()->findOrFaiL($arr['product_id']);
        $product->update($arr);
        return $product;
    }

    public function deleteProductVariations(Product $product,array $arr):bool|null
    {  
        return ($product->variations()->exists()) ? $product->variations()->whereNotIn('id', array_map('hashid_decode',$arr['product_variation_id']))->delete() : NULL;
    }

    public function searchProducts(string $search):Collection
    {   
        return Product::with(['variations', 'unit'])->whereAny(['name', 'sku'], 'like', "%{$search}%")->get();
    }

    public function productAndVariationRow(string $product_id, string $product_variation_id=null):Product|ProductVariation
    {
        return (isset($product_variation_id)) 
            ? ProductVariation::with(['product.category'])->findOrFail(hashid_decode($product_variation_id))
            :Product::findOrFaiL(hashid_decode($product_id));
    }
    
    public function getSingleProduct(string $product_id):Product
    {
        return Product::with(['variations'])->findOrFail(hashid_decode($product_id));
    }

    public function updateThumbail(Product $product, array $imageData): void
    {  
        $product->thumbnail()->updateOrCreate(
            ['mediable_id' => $product->id],
            [
                'filename'     => $imageData['image'],
                'thumbnail'    => $imageData['thumbnail'],
                'type'         => 'thumbnail'
            ]
        );
    }
    
    public function updateProductStock($product_id, $stock, $type):bool
    {
        $query = Product::where('id', hashid_decode($product_id));
        if ($type === 'increment') {
            return $query->increment('stock', $stock);
        } elseif ($type === 'decrement') {
            return $query->decrement('stock', $stock);
        }
        return false; 
    }

    public function productSalesChart():SupportCollection
    {
        return  Product::with('saleitems')->get()->map(function($product){            
            return [
                'product_name' => $product->name,
                'quantity_sum' => $product->saleitems->sum('quantity'),   
                'total_sum'    => $product->saleitems->sum('total'),         
            ];
        });
    }

    public function updateProductShopifyId($product_id, $shopify_id):bool
    {   
        return Product::findOrFail($product_id)->update(['wordpress_id'=>$shopify_id]);
    }

    public function remarks($remarks, $product_id):bool
    {
        return $this->product->where('id', hashid_decode($product_id))->update(['remarks'=>$remarks]);
    }

    public function getPurchaseProducts(): Collection
    {
        return $this->product->has('purchaseItems')->get();
    }

    public function saveAsDraft(array $arr):void
    {   
        $this->product->updateOrCreate([
            'id'    => $arr['product_id'] ?? null,
        ],$arr);
    }

}