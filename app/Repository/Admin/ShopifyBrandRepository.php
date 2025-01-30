<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\BrandInterface;
use App\Interfaces\Admin\ShopifyBrandInterface;
use PHPShopify\ShopifySDK;

class ShopifyBrandRepository implements ShopifyBrandInterface
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

    public function store($arr){
        $brandData = [
            "title" => $arr['brand_name'],  
            "body_html" => "",  
            "sort_order" => "best-selling",  
            "image" => [
                "src" => $input['image'] ?? '',
            ],
            "collection_type"   => "",
        ];
        
        $response = $this->shopify->CustomCollection->post($brandData);
        return $response['id'];
    }

    
    public function update(array $arr, $shopify_id=null)
    {   

        if(!is_null($shopify_id)){
            $brandData = [
                "title" => $arr['brand_name'],  
                "body_html" => "",  
                "sort_order" => "best-selling",  
                "image" => [
                    "src" => $arr['image'] ?? '',
                ],
                "collection_type" => "",
            ];
            return $this->shopify->CustomCollection($shopify_id)->put($brandData);
        }
    }
    
}
