<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory,HashidTrait, SoftDeletes;

    protected $table = 'units';

    protected $fillable = ['admin_id', 'name', 'short_hand', 'status'];
}
