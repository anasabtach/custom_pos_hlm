<?php

namespace App\Repository\Admin;


use App\Interfaces\Admin\ShopifyProductInterface;
use PHPShopify\ShopifySDK;

class ShopifyProductRepository implements ShopifyProductInterface
{
    protected $shopify;

    public function __construct()
    {
        $config = [
            'ShopUrl'      => config('app.shopify_shop_url'),
            'ApiVersion'   => '2024-07',
            'AccessToken'  => config('app.shopify_access_token'),
        ];

        $this->shopify = new ShopifySDK($config);
    }

    public function store($arr, $image_data)
    {   
        $images[] = ['src'=>asset($image_data['image'])];
        $productData = [
            "title" => $arr->name,
            "body_html" => $arr->notes ?? "",
            "vendor" => "",  // Shopify doesn't directly map 'brand_id', but you can set this to your brand name
            "product_type" => "",  // Set this according to your product type
            "tags" => "",  // You can add tags for searchability in Shopify
            "variants" => [
                [
                    "sku" => $arr->sku,  // Maps to 'product_code'
                    "price" => $arr->price,  // Maps to 'product_price'
                    "inventory_quantity" => $arr->stock,  // Maps to 'purchase_quantity'
                    "inventory_management" => "shopify",  // To enable inventory tracking
                ],
            ],
            "images" => $images,  // Add images to the product data
            'status' => ($arr['status'] == 1) ? 'active' : 'draft'
        ];
        $response = $this->shopify->Product->post($productData);
        return $response['id'];
    }
    // public function store($arr)
    // {   //dd($arr);
    //     //    dd($arr);
    //     // Prepare the images data
    //     $images = [];
    //     // if (!empty($product->mainProduct->image_url['imageUrls'])) {
    //     //     foreach ($product->mainProduct->image_url['imageUrls'] as $imageUrl) {
    //     //         $images[] = [
    //     //             'src' => $imageUrl,
    //     //         ];
    //     //     }
    //     // }

    //     $productData = [
    //         "title" => $arr['product_name'],
    //         "body_html" => $arr['notes'] ?? "",
    //         "vendor" => "",  // Shopify doesn't directly map 'brand_id', but you can set this to your brand name
    //         "product_type" => "",  // Set this according to your product type
    //         "tags" => "",  // You can add tags for searchability in Shopify
    //         "variants" => [
    //             [
    //                 "sku" => $arr['sku'],  // Maps to 'product_code'
    //                 "price" => $arr['price'],  // Maps to 'product_price'
    //                 "inventory_quantity" => $arr['stock'],  // Maps to 'purchase_quantity'
    //                 "inventory_management" => "shopify",  // To enable inventory tracking
    //             ],
    //         ],
    //         "images" => $arr['product_thumbnail'],  // Add images to the product data
    //     ];
    //     $response = $this->shopify->Product->post($productData);

    //     return $response['id'];
    //     // $this->latest()->first()->update(['shopify_id' => $response['id']]);
    // }


    public function update(array $arr, $shopify_id = null, $image_data)
    {
        // Ensure image data is valid
     
        if (!empty($image_data['image'])) {
            $images[] = ['src' => asset($image_data['image'])]; // Use 'url' for absolute URL
        }
       
    
        if (!is_null($shopify_id)) {
            $variantData = [];
    
            $variantData['sku'] = !empty($arr['sku']) ? $arr['sku'] : $shopify_id->sku;
            $variantData['price'] = !empty($arr['product_price']) ? $arr['product_price'] : $shopify_id->price;
            $variantData['inventory_quantity'] = isset($arr['stock']) ? $arr['stock'] : $shopify_id->stock;
    
            $productData = [
                "title" => $arr['product_name'],
                "body_html" => $arr['notes'] ?? "",
                "vendor" => "",
                "product_type" => "",
                "tags" => "",
                "variants" => [$variantData],
                "images" => isset($images) ? $images : '',
                'status' => ($arr['status'] == 1) ? 'active' : 'draft'
            ];
    
            // Make the Shopify API request
            $response = $this->shopify->Product($shopify_id->shopify_id)->put($productData);
    
        }
    }
    

    public function delete($shopify_id){
        $this->shopify->Product($shopify_id)->delete();
    }
}
