<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Traits\HashidTrait;

class Media extends Model
{
    use HasFactory, HashidTrait;
    
    protected $guarded = [];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
