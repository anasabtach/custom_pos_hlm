<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Supplier extends Model
{
    use HasFactory, HashidTrait;

    protected $table = 'suppliers';

    protected $fillable = [
        'admin_id','name', 'email', 'phone_no', 'city', 'country', 'address', 'note'
    ];
}
