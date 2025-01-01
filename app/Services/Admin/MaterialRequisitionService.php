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
    
    public function getAllMaterialRequisitions(){
        return $this->repository->getAllMaterialRequisitions();
    }

    public function create($data){
        $this->repository->create($this->createArr($data));
    }

    public function updateStatus($id, $status, $remarks){
        return $this->repository->updateStatus($id, $status, $remarks);
    }

    public function getLpos(){
        return $this->repository->getLpos();
    }
    
    public function editLpo($id){
        return $this->repository->editLpo($id);
    }
    
    public function updateLpo($arr){
        $lpo = $this->repository->updateLpo($arr);
        if(isset($arr['product_image'])){
            $this->repository->storeLpoProductImages($arr['product_image'], $lpo);
        }
        if(isset($arr['invoice_document'])){
            $this->updateProfile($arr['invoice_document'], $lpo);
        }
    }

    public function updateProfile($data, $lpo){
        CommonHelper::removeImage(@$lpo->invoiceImage->thumbnail);
        CommonHelper::removeImage(@$lpo->invoiceImage->filename);
        $data = CommonHelper::uploadSingleImage($data, 'lpo_invoice');
        $this->repository->updateInvoiceImage($lpo, $data);
    }

    public function deleteLpoPorductImage(string $id){
        return $this->repository->deleteLpoPorductImage($id);
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