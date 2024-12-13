<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\BrandObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([BrandObserver::class])]
class Brand extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;
    
    protected $table = 'brands';

    protected $fillable = ['name', 'admin_id', 'slug', 'status', 'order_by', 'shopify_brand_id'];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all brands");
        return $query;
    }

}
