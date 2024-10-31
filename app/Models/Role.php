<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Role extends Model
{
    use HasFactory, HashidTrait;

    protected $table = 'roles';

    protected $guarded = [];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
