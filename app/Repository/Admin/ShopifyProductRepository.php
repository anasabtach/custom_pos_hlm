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

    public function store($arr)
    {
        //    dd($arr);
        // Prepare the images data
        $images = [];
        // if (!empty($product->mainProduct->image_url['imageUrls'])) {
        //     foreach ($product->mainProduct->image_url['imageUrls'] as $imageUrl) {
        //         $images[] = [
        //             'src' => $imageUrl,
        //         ];
        //     }
        // }

        $productData = [
            "title" => $arr['product_name'],
            "body_html" => $arr['notes'] ?? "",
            "vendor" => "",  // Shopify doesn't directly map 'brand_id', but you can set this to your brand name
            "product_type" => "",  // Set this according to your product type
            "tags" => "",  // You can add tags for searchability in Shopify
            "variants" => [
                [
                    "sku" => $arr['sku'],  // Maps to 'product_code'
                    "price" => $arr['price'],  // Maps to 'product_price'
                    "inventory_quantity" => $arr['stock'],  // Maps to 'purchase_quantity'
                    "inventory_management" => "shopify",  // To enable inventory tracking
                ],
            ],
            "images" => $arr['product_thumbnail'],  // Add images to the product data
        ];
        $response = $this->shopify->Product->post($productData);

        return $response['id'];
        // $this->latest()->first()->update(['shopify_id' => $response['id']]);
    }


    public function update(array $arr, $shopify_id = null)
    {

        $images = [];
        // if (!empty($product->mainProduct->image_url['imageUrls'])) {
        //     foreach ($product->mainProduct->image_url['imageUrls'] as $imageUrl) {
        //         $images[] = [
        //             'src' => $imageUrl,
        //         ];
        //     }
        // }

        if(!is_null($shopify_id)){
            $variantData = [];

            if (!empty($arr['sku'])) {
                $variantData['sku'] = $arr['sku'];
            }
    
            // if (!empty($arr['product_price'])) {
            //     $variantData['price'] = $arr['product_price'];
            // }
    
            if (isset($arr['stock'])) {  // Use isset() to allow for 0 quantity
                $variantData['stock'] = $arr['stock'];
            }
    
            // if (!empty($arr['inventory_management'])) {
            //     $variantData['inventory_management'] = $arr['inventory_management'];
            // }
    
            $productData = [
                "title" => $arr['product_name'],
                "body_html" => $arr['notes'] ?? "",
                "vendor" => "",  // Shopify doesn't directly map 'brand_id', but you can set this to your brand name
                "product_type" => "",  // Set this according to your product type
                "tags" => "",  // You can add tags for searchability in Shopify
                "variants" => [
                    $variantData,
                ],
                "images" => $images,  // Add images to the product data
            ];
            $response = $this->shopify->Product($shopify_id)->put($productData);
        }
    }
}
