<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\StaffObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([StaffObserver::class])]
class Admin extends Authenticatable
{
    use HasFactory, HashidTrait, HasPermissionsTrait, SoftDeletes;
    
    protected $fillable  = ['first_name', 'last_name', 'email', 'password', 'status', 'user_type', 'user_permissions'];

    protected $casts = ['user_permissions'=>'object'];


    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all staff");
        return $query;
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, array $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name']
        );
    }
    
    public function profileImage(): MorphOne
    {
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'media_url' => null
        ]);
    }

    protected function password():Attribute
    {
        return Attribute::make(
            set: fn (string $value) => bcrypt($value),
        );
    }
}
