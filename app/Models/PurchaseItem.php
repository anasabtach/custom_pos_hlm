<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class PurchaseItem extends Model
{
    use HasFactory,HashidTrait;

    protected $table = 'purchase_items';

    protected $fillable = [
        'purchase_id',
        'product_id',
        'product_variation_id',
        'cost',
        'price',
        'qty',
        'total',
        'expiration'
    ];
}
