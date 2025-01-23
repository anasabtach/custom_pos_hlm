<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\SupplierObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([SupplierObserver::class])]
class Supplier extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $table = 'suppliers';

    protected $fillable = [
        'admin_id', 'country_id', 'name', 'email', 'phone_no', 'city', 'country', 'address', 'note', 'trn', 'country_code'
    ];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all suppliers");
        return $query;
    }

    public function offeredProducts(){
        return $this->belongsToMany(Product::class, 'supplier_products', 'supplier_id', 'product_id')->withTimestamps();
    }

    public function getOfferedProductsIds(){
        return $this->offeredProducts->pluck('id')->toArray();
    }

    public function trnDocuments(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
