<?php

namespace App\Interfaces\Admin;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Collection;

interface ProductInterface
{   
    public function getProducts():Collection;

    public function storeProduct(array $arr):Product;

    public function storeProductVariation(Product $product, array $arr):Collection;

    public function editProduct(string $product_id):Product;

    public function updateProduct(array $arr):Product;

    public function deleteProductVariations(Product $product):bool;

    public function searchProducts(string $search):Collection;

    public function productAndVariationRow(string $product_id, string $product_variation_id=null):Product|ProductVariation;

    public function getSingleProduct(string $product_id):Product;


}