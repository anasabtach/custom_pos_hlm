<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory, SoftDeletes, HashidTrait;

    protected $table = 'logs';

    protected $fillable = [
        'admin_id', 'message',
    ];
}
