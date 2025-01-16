<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\ProductInterface;
use App\Models\Product;
use App\Repository\Admin\ShopifyProductRepository;
use App\Repository\Admin\WordPressProductRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected $repository;
    protected $shopifyRepository;
    protected $wordpressyRepository;

    public function __construct(ProductInterface $repository, ShopifyProductRepository $shopifyRepository, WordPressProductRepository $wordpressyRepository)
    {
        $this->repository            = $repository;
        $this->shopifyRepository     = $shopifyRepository;
        $this->wordpressyRepository  = $wordpressyRepository;
    }

    public function getProdcuts(){//get all products
        return $this->repository->getProducts();
    }

    public function getDeletedProdcuts(){//get all products
        return $this->repository->getDeletedProdcuts();
    }

    public function store($arr){//store product
        DB::transaction(function() use ($arr){
            // $arr['shopify_id'] = $this->shopifyRepository->store($arr);
            $product    = $this->repository->storeProduct($this->createProductArr($arr));
            $image_data = $this->updateThumbnail($product, $arr['product_thumbnail']);//store product thumbnail image
            //$shopify_id = $this->shopifyRepository->store($product, $image_data);
            $shopify_id = $this->wordpressyRepository->store($product, $image_data);
            $this->repository->updateProductShopifyId($product->id, $shopify_id);
            
            if($arr['has_variation']){//if has variation
                $variation_arr = $this->createProductVariationArr($arr);//create the variation array
                $this->repository->storeProductVariation($product, $variation_arr);
            }
        });

    }

    // public function createProductVariationArr($arr)//create variaton array
    // {
    //     $product_variation_arr = collect($arr['variation_sku'])->map(function($data, $key) use ($arr) {
    //         return [
    //             'unit_id'       => isset($arr['variation_unit_id'][$key]) ? hashid_decode($arr['variation_unit_id'][$key]) : null,
    //             'sku'           => $arr['variation_sku'][$key],
    //             'price'         => $arr['variation_price'][$key],
    //             'stock'         => $arr['variation_stock'][$key],
    //             'stock_alert'   => $arr['variation_stock_alert'][$key],
    //             'expiration'    => $arr['variation_expiration'][$key],
    //             'color'         => $arr['variation_color'][$key] ?? null,
    //             'thumbnail'     => (isset($arr['variation_image'][$key]) && !empty($arr['variation_image'][$key]))
    //                                 ? CommonHelper::uploadSingleImage($arr['variation_image'][$key], 'product_thumbnail')['image']
    //                                 : null,
    //             'id'            => hashid_decode($arr['product_variation_id'][$key]) ?? null,
    //         ];
    //     })->toArray();
    //     return $product_variation_arr;  
    // }

    public function createProductVariationArr($arr)
    {
        $product_variation_arr = [];
        
        foreach ($arr['variation_sku'] as $key => $sku) {
            $variation = [
                'unit_id'       => isset($arr['variation_unit_id'][$key]) ? hashid_decode($arr['variation_unit_id'][$key]) : null,
                'sku'           => $sku,
                'price'         => $arr['variation_price'][$key],
                'stock'         => $arr['variation_stock'][$key],
                'stock_alert'   => $arr['variation_stock_alert'][$key],
                'expiration'    => $arr['variation_expiration'][$key],
                'color'         => $arr['variation_color'][$key] ?? null,
                'name'          => $arr['name'][$key] ?? null,
            ];

            // Set 'id' only if 'product_variation_id' exists
            if (!empty($arr['product_variation_id'][$key])) {
                $variation['id'] = hashid_decode($arr['product_variation_id'][$key]);
            }

            // Only add the thumbnail if a new image is provided
            if (isset($arr['variation_image'][$key]) && !empty($arr['variation_image'][$key])) {
                $variation['thumbnail'] = CommonHelper::uploadSingleImage($arr['variation_image'][$key], 'product_thumbnail')['image'];
            }

            $product_variation_arr[] = $variation;
        }

        return $product_variation_arr;
    }


    public function createProductArr($arr) {
        $productArr = [
            'admin_id'       => auth()->id(),
            'category_id'    => hashid_decode($arr['category_id']),
            'unit_id'        => isset($arr['unit_id']) ? hashid_decode($arr['unit_id']) : null,
            'brand_id'       => isset($arr['brand_id']) ? hashid_decode($arr['brand_id']) : null,
            'name'           => $arr['product_name'],
            'sku'            => $arr['sku'],
            'price'          => $arr['price'],
            'stock'          => $arr['stock'],
            'stock_alert'    => $arr['stock_alert'],
            'description'    => $arr['description'],
            'has_variation'  => $arr['has_variation'],
            'expiration'     => $arr['expiration'],
            'product_id'     => isset($arr['product_id']) ? hashid_decode($arr['product_id']) : null,
            'supplier_id'    => isset($arr['supplier_id']) ? hashid_decode($arr['supplier_id']) : null,
            'status'         => $arr['status'],
            'color'          => $arr['color'],
            'is_draft'       => '0',
        ];
    
        // Only add `shopify_id` if it's present in the array
        if (isset($arr['shopify_id'])) {
            $productArr['shopify_id'] = $arr['shopify_id'];
        }
    
        return $productArr;
    }
    

    public function editProduct($product_id){
        return $this->repository->editProduct($product_id);
    }

    public function updateProduct($arr){
            $shopify_id =             $this->editProduct($arr['product_id']);
        
        // DB::transaction(function() use ($arr,$shopify_id){
            $product = $this->repository->updateProduct($this->createProductArr($arr));//update the product
            $image_data = $this->updateThumbnail($product, @$arr['product_thumbnail']);
            // $this->shopifyRepository->update($arr, $shopify_id, $image_data);
            $this->wordpressyRepository->update($product, $shopify_id->wordpress_id, $image_data);
            $this->repository->deleteProductVariations($product, $arr);//delete the variations (always delete the variation because if has_variaion not set on update we could leave the variations in table)
            if($arr['has_variation']){//if has variation then create the new variations
                $variation_arr = $this->createProductVariationArr($arr);//create the variation array
                $this->repository->storeProductVariation($product, $variation_arr);//store the variation
            }
        //});
    }

    public function delete($product_id){
        //$this->shopifyRepository->delete($this->repository->editProduct($product_id)->shopify_id);
        $this->wordpressyRepository->delete($this->repository->editProduct($product_id)->wordpress_id);
        return $this->repository->delete($product_id);
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
            return $data;
        }
    }


    public function remarks($remark, $product_id){
        return $this->repository->remarks($remark, $product_id);
    }

    public function getPurchaseProducts(){
        return $this->repository->getPurchaseProducts();
    }

    public function saveAsDraft($arr){
        $allNull = count(array_diff(collect($arr)->except(['_token', 'status', 'has_variation'])->toArray(), [null])) === 0;
        if(!$allNull){
           $arr = [
            'admin_id'          => auth('admin')->id(),
            'category_id'       => (isset($arr['category_id'])) ? hashid_decode($arr['category_id']) : null,
            'brand_id'          => (isset($arr['brand_id'])) ? hashid_decode($arr['brand_id']) : null,
            'unit_id'           => (isset($arr['unit_id'])) ? hashid_decode($arr['unit_id']) : null,
            'supplier_id'       => (isset($arr['supplier_id'])) ? hashid_decode($arr['supplier_id']) : null,
            'category_id'       => (isset($arr['category_id'])) ? hashid_decode($arr['category_id']) : null ,
            'product_id'        => (isset($arr['product_id'])) ? hashid_decode($arr['product_id']) : null ,
            'name'              => ($arr['product_name']) ?? null,
            'sku'               => ($arr['sku']) ?? null,
            'price'             => ($arr['price']) ?? null,
            'stock'             => ($arr['stock']) ?? null,
            'stock_alert'       => ($arr['stock_alert']) ?? null,
            'expiration'        => ($arr['expiration']) ?? null,
            'color'             => ($arr['color']) ?? null,
            'description'       => ($arr['description']) ?? null,
            'status'            => '0',
            'has_variation'     => '0',
            'is_draft'          => '1'
           ];
            $this->repository->saveAsDraft($arr);
        }else{
            throw new Exception('All fields are empty');
        }
    }
}