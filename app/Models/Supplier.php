<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $table = 'suppliers';

    protected $fillable = [
        'admin_id', 'country_id', 'name', 'email', 'phone_no', 'city', 'country', 'address', 'note'
    ];

    public function offeredProducts(){
        return $this->belongsToMany(Product::class, 'supplier_products', 'supplier_id', 'product_id')->withTimestamps();
    }

    public function getOfferedProductsIds(){
        return $this->offeredProducts->pluck('id')->toArray();
    }
}
