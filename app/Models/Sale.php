<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Sale extends Model
{
    use HasFactory,HashidTrait;

    protected $guarded = [];

    public function saleItems(){
        return $this->hasMany(SaleItem::class, 'sale_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
