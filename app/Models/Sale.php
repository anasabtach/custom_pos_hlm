<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\SaleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([SaleObserver::class])]
class Sale extends Model
{
    use HasFactory,HashidTrait, SoftDeletes;

    protected $guarded = [];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all sales");
        return $query;
    }

    public function saleItems(){
        return $this->hasMany(SaleItem::class, 'sale_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
