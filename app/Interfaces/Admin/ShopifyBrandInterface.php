<?php

namespace App\Interfaces\Admin;


interface ShopifyBrandInterface
{   
    public function store(array $arr);    
   
    public function update(array $arr, $shopify_id=null);
}
