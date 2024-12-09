<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
class Color extends Model
{
    use HasFactory, SoftDeletes, HashidTrait;

    protected $table = 'colors';

    protected $fillable = ['admin_id', 'color'];
}
