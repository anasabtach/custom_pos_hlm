<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariation extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $fillable = [
        'product_id',
        'unit_id',
        'wordpress_id',
        'sku',
        'price',
        'stock',
        'stock_alert',
        'expiration',
        'thumbnail',
        'color',
        'name'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
        
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    
    // public function thumbnail(): MorphOne
    // {
    //     return $this->morphOne(Media::class, 'mediable');
    // }
}
