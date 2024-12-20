<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\ProductInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected $repository;

    public function __construct(ProductInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getProdcuts(){//get all products
        return $this->repository->getProducts();
    }

    public function store($arr){//store product
        DB::transaction(function() use ($arr){
            $product = $this->repository->storeProduct($this->createProductArr($arr));
            $this->updateThumbnail($product, $arr['product_thumbnail']);//store product thumbnail image
            if($arr['has_variation']){//if has variation
                $variation_arr = $this->createProductVariationArr($arr);//create the variation array
                $this->repository->storeProductVariation($product, $variation_arr);
            }
        });

    }

    public function createProductVariationArr($arr)//create variaton array
    {
        $product_variation_arr = collect($arr['variation_sku'])->map(function($data, $key) use ($arr) {//first create the collecton of array then iterat over
            return [
                'unit_id'       => (isset($arr['variation_unit_id'][$key])) ? hashid_decode($arr['variation_unit_id'][$key]) : NULL,
                'sku'           => $arr['variation_sku'][$key],
                'price'         => $arr['variation_price'][$key],
                'stock'         => $arr['variation_stock'][$key],
                'stock_alert'   => $arr['variation_stock_alert'][$key],
                'expiration'    => $arr['variation_expiration'][$key],
            ];
        })->toArray();
        return $product_variation_arr;
    }

    public function createProductArr($arr){//create product arr
        return [
            'admin_id'             => auth()->id(),
            'category_id'          => hashid_decode($arr['category_id']),
            'unit_id'              => isset($arr['unit_id']) ? hashid_decode($arr['unit_id']) : NULL,
            'name'                 => $arr['product_name'],
            'sku'                  => $arr['sku'],
            'price'                => $arr['price'],
            'stock'                => $arr['stock'],
            'stock_alert'          => $arr['stock_alert'],
            'description'          => $arr['description'],
            'has_variation'        => $arr['has_variation'],
            'expiration'           => $arr['expiration'],
            'product_id'           => isset($arr['product_id']) ? hashid_decode($arr['product_id']) : NULL,
        ];
    }

    public function editProduct($product_id){
        return $this->repository->editProduct($product_id);
    }

    public function updateProduct($arr){
        DB::transaction(function() use ($arr){
            $product = $this->repository->updateProduct($this->createProductArr($arr));//update the product
            $this->updateThumbnail($product, @$arr['product_thumbnail']);
            $this->repository->deleteProductVariations($product);//delete the variations (always delete the variation because if has_variaion not set on update we could leave the variations in table)
            if($arr['has_variation']){//if has variation then create the new variations
                $variation_arr = $this->createProductVariationArr($arr);//create the variation array
                $this->repository->storeProductVariation($product, $variation_arr);//store the variation
            }
        });
    }

    public function searchProducts($search = null)
    {
        if (!is_null($search)) {
            $products = $this->repository->searchProducts($search);
            $product_arr = [];
            foreach ($products as $product) {
                if ($product->variations && $product->variations->isNotEmpty()) {
                    foreach ($product->variations as $variation) {
                        $unitName = $variation->unit->name ?? 'Unknown Unit';
                        $product_arr[] = ['id' => "{$product->hashid}/{$variation->hashid}", 'text' => "{$product->name} | $unitName"];
                    }
                }else{
                    $product_arr[] = ['id' => $product->hashid, 'text' => $product->name];
                }
            }
            return $product_arr;
        }
    }

    public function productAndVariationRow($product_id, $product_variation_id){
        return $this->repository->productAndVariationRow($product_id, $product_variation_id);
    }

    public function updateThumbnail(Product $product, $thumbnail){        
        if(isset($thumbnail)){
            CommonHelper::removeImage(@$product->thumbnail->thumbnail);
            CommonHelper::removeImage(@$product->thumbnail->filename);
            $data = CommonHelper::uploadSingleImage($thumbnail, 'product_thumbnail');
            $this->repository->updateThumbail($product, $data);
        }
    }


}