<?php

namespace App\Interfaces\Admin;

use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Collection;

interface PurchaseItemInterface
{   
    public function purchaseItemSum():int;

}