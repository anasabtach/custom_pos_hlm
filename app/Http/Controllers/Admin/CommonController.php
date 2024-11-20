<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPShopify\ShopifySDK;

class CommonController extends Controller
{
    public function updateStatus($table_name, $column, $id, $value){
        try{
            DB::table($table_name)->where('id', hashid_decode($id))->update([
                $column => $value,
            ]);
            if($table_name == 'products'){
               
                $this->updateShopifyStatus($id, $value);
            }
            return response()->json(['success'  => 'Status updated successfully']);
        }catch(Exception $e){
            return response()->json(['error'  => 'some error occured']);
        }
    }

    public function updateShopifyStatus($product_id, $status){
        // Shopify API credentials and configuration
        $config = [
            'ShopUrl'      => config('app.shopify_shop_url'),
            'ApiVersion'   => '2024-07',
            'AccessToken'  => config('app.shopify_access_token'),
        ];
    
        // Initialize Shopify SDK with the configuration
        $shopify = new ShopifySDK($config);
    
        // Find the product by its ID and retrieve the Shopify ID
        $product = Product::findOrFail(hashid_decode($product_id));
    
        // Check that we have a valid Shopify ID
        if (!$product->shopify_id) {
            return response()->json(['error' => 'Product does not have a Shopify ID'], 400);
        }
    
        // Set the product's 'published' field based on the passed status
        $productData = [
            "status" => ($status == 1) ? 'active' : 'draft',
        ];
    
        // Make the API request to update the product's published status
        $response = $shopify->Product($product->shopify_id)->put($productData);
    }
    
}
