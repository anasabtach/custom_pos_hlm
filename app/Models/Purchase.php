<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    
    public function items(){
        return $this->hasMany(PurchaseItem::class, 'purchase_id', 'id');
    }
}
