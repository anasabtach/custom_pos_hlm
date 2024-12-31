<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\MaterialRequisitionInterface;
use App\Models\MaterialRequisition;
use Illuminate\Database\Eloquent\Collection;

class MaterialRequisitionRepository implements MaterialRequisitionInterface
{   
    public function __construct(public MaterialRequisition $model)
    {
        
    }

    public function getMaterailRequistions():Collection
    {
        return $this->model->with(['admin', 'category', 'product', 'supplier', 'brand', 'unit'])->when(auth('admin')->user()->type != 'admin', function($query){
                    $query->where('admin_id', auth('admin')->id());
                })->latest()->get();
    }
    public function create(array $arr):MaterialRequisition
    {
        return $this->model->create($arr);
    }

}