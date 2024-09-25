<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Unit extends Model
{
    use HasFactory,HashidTrait;

    protected $table = 'units';

    protected $fillable = ['admin_id', 'name', 'short_hand', 'status'];
}
