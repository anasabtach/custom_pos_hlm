<?php

namespace App\Interfaces\Admin;

use App\Models\Sale;

interface SaleInterface
{
    public function saleDetail(string $id):Sale;
}