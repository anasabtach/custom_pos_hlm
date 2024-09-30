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

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
        
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
