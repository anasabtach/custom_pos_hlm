<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Traits\HashidTrait;

class Admin extends Authenticatable
{
    use HasFactory, HashidTrait;
    
    protected $fillable  = ['first_name', 'last_name', 'email', 'password', 'status'];

    public function profileImage(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable');
    }

    protected function password():Attribute
    {
        return Attribute::make(
            set: fn (string $value) => bcrypt($value),
        );
    }
}
