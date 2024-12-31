<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Repository\Admin\MaterialRequisitionRepository;

class MaterialRequisitionService
{
    protected $repository;

    public function __construct(MaterialRequisitionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getMaterailRequistions(){
        return $this->repository->getMaterailRequistions();
    }

    public function create($data){
        $this->repository->create($this->createArr($data));
    }
    
    public function createArr($data){
        return [
            'reference_no'          => (!isset($data['material_requisiton_id'])) ? CommonHelper::generateId('material_requisitions', 'reference_no') : '',
            'admin_id'              => auth('admin')->id(),
            'category_id'           => hashid_decode($data['category_id']),
            'supplier_id'           => hashid_decode($data['supplier_id']),
            'product_id'            => hashid_decode($data['product_id']),
            'brand_id'              => hashid_decode($data['brand_id']),
            'unit_id'               => hashid_decode($data['category_id']),
            'color'                 => $data['color'],
            'temperature_control'   => $data['temperature_control'],
            'quantity'              => $data['order_quantity'],
            'price'                 => $data['price'],
            'sku'                   => $data['sku'],
            'payment_type'          => $data['payment_type'],
            'payment_terms'         => $data['payment_terms'],
            'remarks'               => $data['remarks'],
            'material_requisiton_id'=> (isset($data['material_requisiton_id'])) ? hashid_decode($data['material_requisiton_id']) : null,
        ];
    }
}