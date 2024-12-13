<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([RoleObserver::class])]
class Role extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $table = 'roles';

    protected $guarded = [];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all roles");
        return $query;
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
