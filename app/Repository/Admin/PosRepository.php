<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\PosInterface;
use App\Models\Sale;

class PosRepository implements PosInterface
{
    public function bill($sale_id){
        return Sale::with(['saleItems', 'saleItems.product', 'saleItems.productVariation'])->findOrFail(hashid_decode($sale_id));
    }
}