<?php

namespace App\Interfaces\Admin;

use App\Models\MaterialRequisition;
use Illuminate\Database\Eloquent\Collection;

interface MaterialRequisitionInterface
{   
    public function getMaterailRequistions():Collection;
    
    public function create(array $arr):MaterialRequisition;

    public function getAllMaterialRequisitions():Collection;

    public function updateStatus(string $id, string $status, string $remarks):bool;  

    public function getLpos():Collection;

    public function editLpo(string $id):MaterialRequisition;

    public function updateLpo(array $arr):MaterialRequisition;

    public function deleteLpoPorductImage(string $id):bool;

}