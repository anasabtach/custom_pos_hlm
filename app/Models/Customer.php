<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Customer extends Model
{
    use HasFactory,HashidTrait;

    protected $table = 'customers';

    protected $fillable = [
        'admin_id', 'country_id', 'name', 'email', 'phone_no', 'city', 'country', 'address', 'dob',
    ];
}
