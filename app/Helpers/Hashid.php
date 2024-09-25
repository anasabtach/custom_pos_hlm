<?php

namespace App\Helpers;

use Hashids\Hashids;

class Hashid
{
    protected static $hashid;

    public function __construct()
    {  
        self::$hashid = new Hashids('default_salt', 33);
    }

    public static function hashid_encode($id)
    {    new self();
        return self::$hashid->encode($id);
    }

    public static function hashid_decode($id){
        new self();
        return self::$hashid->decode($id)[0];
    }
}
