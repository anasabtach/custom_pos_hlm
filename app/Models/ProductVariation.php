<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class ProductVariation extends Model
{
    use HasFactory, HashidTrait;

    protected $fillable = [
        'product_id',
        'unit_id',
        'sku',
        'price',
        'stock',
        'stock_alert',
        'expiration'
    ];
}
