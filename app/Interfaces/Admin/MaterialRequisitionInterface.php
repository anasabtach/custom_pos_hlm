<?php

namespace App\Interfaces\Admin;

use App\Models\MaterialRequisition;
use Illuminate\Database\Eloquent\Collection;

interface MaterialRequisitionInterface
{   
    public function getMaterailRequistions():Collection;
    
    public function create(array $arr):MaterialRequisition;
}