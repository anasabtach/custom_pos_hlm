<?php

namespace App\Interfaces\Admin;



interface WordpressProductInterface
{   
    public function store(array $arr, array $image_data);    
   
    public function update(array $arr, $wordpressId=null, $image_data);
    
    public function delete($wordpressId);
}
