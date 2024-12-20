<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\SaleInterface;
use App\Models\Sale;

class SaleRepository implements SaleInterface
{   

    public $sale;

    public function __construct(Sale $sale){
        $this->sale = $sale;
    }
    public function saleDetail(string $id):Sale
    {
        return $this->sale->with(['saleItems', 'customer', 'saleItems.product', 'saleItems.productVariation.unit'])->findOrFail(hashid_decode($id));
    }
}