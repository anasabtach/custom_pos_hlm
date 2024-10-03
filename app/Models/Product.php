<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory, HashidTrait;

    protected $fillable = [
        'admin_id',
        'category_id',
        'unit_id',
        'name',
        'sku',
        'price', 
        'stock',
        'stock_alert',
        'description',
        'has_variation',
        'status',
        'expiration'
    ];

    public function thumbnail(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }

    public function variations(){
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
