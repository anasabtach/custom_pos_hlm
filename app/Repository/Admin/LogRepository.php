<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\LogInterface;
use App\Models\Log;
use Illuminate\Database\Eloquent\Collection;

class LogRepository implements LogInterface
{   
    public function __construct(public Log $logs)
    {
        
    }

    public function getLogs():Collection
    {
        return $this->logs->with(['staff'])->latest()->get();
    }
}