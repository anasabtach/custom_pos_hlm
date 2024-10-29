<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class SaleItem extends Model
{
    use HasFactory, HashidTrait;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function productVariation(){
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }

}
