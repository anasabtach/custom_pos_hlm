<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Brand extends Model
{
    use HasFactory, HashidTrait;
    
    protected $table = 'brands';

    protected $fillable = ['name', 'admin_id', 'slug', 'status', 'order_by', 'shopify_brand_id'];

}
