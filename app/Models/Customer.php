<?php

namespace App\Models;

use App\Helpers\CommonHelper;
use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CustomerObserver::class])]
class Customer extends Model
{
    use HasFactory,HashidTrait, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'admin_id', 'country_id', 'name', 'email', 'phone_no', 'city', 'country', 'address', 'dob',
    ];

    public function scopeWithLog($query)
    {
        CommonHelper::createLog("viewed all customers");
        return $query;
    }
}
