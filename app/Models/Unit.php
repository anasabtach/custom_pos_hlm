<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\UnitObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([UnitObserver::class])]
class Unit extends Model
{
    use HasFactory,HashidTrait, SoftDeletes;

    protected $table = 'units';

    protected $fillable = ['admin_id', 'name', 'short_hand', 'status'];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all units");
        return $query;
    }
}
