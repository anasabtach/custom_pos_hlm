<?php

namespace App\Traits;

use App\Helpers\Hashid as HashidHelper;

trait HashidTrait
{
    public function getHashidAttribute()
    {   
        return HashidHelper::hashid_encode($this->id);
    }

    // public static function findByHashid($hashid)
    // {
    //     $id = HashidHelper::hashid_decode($hashid);
    //     return static::find($id);
    // }
}
