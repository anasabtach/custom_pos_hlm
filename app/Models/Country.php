<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Country extends Model
{
    use HasFactory, HashidTrait;

    public $timestamps = false;
    
    protected $table = 'countries';
}
