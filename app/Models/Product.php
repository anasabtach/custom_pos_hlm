<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $fillable = [
        'admin_id',
        'category_id',
        'unit_id',
        'brand_id',
        'name',
        'sku',
        'price', 
        'stock',
        'stock_alert',
        'description',
        'has_variation',
        'status',
        'expiration',
        'color',
        'shopify_id',
        'supplier_id',
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
    
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function sales(){
        return $this->hasMany(Sale::class, 'product_id', 'id');
    }

    public function saleitems(){
        return $this->hasMany(SaleItem::class, 'product_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id')->withDefault([
            'name'  => ''
        ]);
    }
}
