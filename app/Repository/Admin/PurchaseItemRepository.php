<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\PurchaseItemInterface;
use App\Models\PurchaseItem;

class PurchaseItemRepository implements PurchaseItemInterface
{   
    public $purchaseItem;

    public function __construct(PurchaseItem $purchaseItem)
    {   
        $this->purchaseItem = $purchaseItem;
    }

    public function purchaseItemSum():int
    {
        return $this->purchaseItem->sum('total');
    }

    
}