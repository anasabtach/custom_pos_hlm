<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'parent_id', 'slug', 'status', 'order_by'];

    public function subCategories():HasMany{
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
