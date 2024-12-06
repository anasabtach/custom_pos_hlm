<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = ['name', 'parent_id', 'admin_id', 'slug', 'status', 'order_by', 'shopify_id'];

    // public function subCategories():HasMany{
    //     return $this->hasMany(Category::class, 'parent_id', 'id');
    // }
}
