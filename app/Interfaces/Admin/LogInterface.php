<?php

namespace App\Interfaces\Admin;

use Illuminate\Database\Eloquent\Collection;

interface LogInterface
{
    public function getLogs():Collection;
}