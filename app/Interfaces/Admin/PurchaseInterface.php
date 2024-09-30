<?php

namespace App\Interfaces\Admin;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;

interface PurchaseInterface
{
    public function store(array $arr):Purchase;

    public function storePurchaseItems(Purchase $purchase, array $arr):Collection;

}