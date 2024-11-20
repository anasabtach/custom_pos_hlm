<?php

namespace App\Interfaces\Admin;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

interface ProductInterface
{   
    public function getProducts():Collection;

    public function getDeletedProdcuts():Collection;

    public function storeProduct(array $arr):Product;

    public function storeProductVariation(Product $product, array $arr):void;

    public function editProduct(string $product_id):Product;

    public function delete(string $product_id):bool;

    public function updateProduct(array $arr):Product;

    public function deleteProductVariations(Product $product, array $arr):bool|null;

    public function searchProducts(string $search):Collection;

    public function productAndVariationRow(string $product_id, string $product_variation_id=null):Product|ProductVariation;

    public function getSingleProduct(string $product_id):Product;

    public function updateThumbail(Product $product, array $imageData): void;

    public function updateProductStock($product_id, $stock, $type):bool;

    public function productSalesChart():SupportCollection;
    
    public function updateProductShopifyId($product_id, $shopify_id):bool;

}