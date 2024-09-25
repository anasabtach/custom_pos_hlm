<?php

use App\Helpers\CommonHelper;
use App\Helpers\Hashid;


if(!function_exists('hashid_encode')){
    function hashid_encode($id){
        return Hashid::hashid_encode($id);
    }
}

if(!function_exists('hashid_decode')){
    function hashid_decode($id){
        return Hashid::hashid_decode($id);
    }
}

if(!function_exists('uploadSingleImage')){
    function uploadSingleImage($image, $path){
        return CommonHelper::uploadSingleImage($image,$path);
    }
}

if(!function_exists('getImage')){
    function getImage($file){
        return CommonHelper::getImage($file);
    }
}

if(!function_exists('removeImage')){
    function removeImage($file){
        return CommonHelper::removeImage($file);
    }
}