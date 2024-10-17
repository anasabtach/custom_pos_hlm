<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Sale extends Model
{
    use HasFactory,HashidTrait;

    protected $guarded = [];
}
