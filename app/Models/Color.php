<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\ColorObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ColorObserver::class])]
class Color extends Model
{
    use HasFactory, SoftDeletes, HashidTrait;

    protected $table = 'colors';

    protected $fillable = ['admin_id', 'color'];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all colors");
        return $query;
    }
}
