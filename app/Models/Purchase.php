<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\PurchaseObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([PurchaseObserver::class])]
class Purchase extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $table = 'purchases';

    protected $fillable = [
        'slug',
        'batch_no',
        'admin_id',
        'supplier_id',
        'date'
    ];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all purchases");
        return $query;
    }
    
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    
    public function items(){
        return $this->hasMany(PurchaseItem::class, 'purchase_id', 'id');
    }
}
