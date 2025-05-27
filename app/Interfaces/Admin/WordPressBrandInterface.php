<?php

namespace App\Interfaces\Admin;


interface WordPressBrandInterface
{   
    public function store(array $arr);    
   
    public function update(array $arr, $shopify_id=null);
}
