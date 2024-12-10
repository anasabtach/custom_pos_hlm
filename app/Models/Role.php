<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    protected $table = 'roles';

    protected $guarded = [];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
