<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HashidTrait;

class SupplierProduct extends Model
{
    use HasFactory, SoftDeletes, HashidTrait;
}
