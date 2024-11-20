<?php

namespace App\Interfaces\Admin;



interface ShopifyProductInterface
{   
    public function store(array $arr, array $image_data);    
   
    public function update(array $arr, $shopify_id=null, $image_data);
    
    public function delete($shopify_id);
}
