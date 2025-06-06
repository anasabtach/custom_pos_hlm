<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class MaterialRequisition extends Model
{
    use HasFactory,HashidTrait;

    protected $fillable = [
        'admin_id',
        'category_id',
        'product_id',
        'supplier_id',
        'brand_id',
        'unit_id',
        'reference_no',
        'temperature_control',
        'color',
        'quantity',
        'price',
        'sku',
        'payment_terms',
        'payment_type',
        'remarks',
        'status',
        'status_remarks',
        'status_update_date',
        'delivered_quantity',
        'cost_price',
        'batch_no',
        'foc',
        'invoice_no',
        'invoice_date'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function productImages(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function invoiceImage(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable')->where('type', 'document')->withDefault([
            'media_url' => null,
        ]);
    }

    
}
