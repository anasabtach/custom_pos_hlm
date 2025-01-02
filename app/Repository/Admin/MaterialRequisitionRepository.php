<?php

namespace App\Repository\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\MaterialRequisitionInterface;
use App\Models\MaterialRequisition;
use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;

class MaterialRequisitionRepository implements MaterialRequisitionInterface
{   
    public function __construct(public MaterialRequisition $model)
    {
        
    }

    public function getMaterailRequistions():Collection
    {   //dd($this->model->with(['admin', 'category', 'product', 'supplier', 'brand', 'unit'])->where('admin_id', auth('admin')->id())->latest()->get());
        return $this->model->with(['admin', 'category', 'product', 'supplier', 'brand', 'unit'])->where('admin_id', auth('admin')->id())->latest()->get();
    }

    public function create(array $arr):MaterialRequisition
    {
        return $this->model->create($arr);
    }

    public function getAllMaterialRequisitions():Collection
    {
        return $this->model->with(['admin', 'category', 'product', 'supplier', 'brand', 'unit'])->latest()->get();
    }

    public function updateStatus(string $id, string $status, string $remarks): bool
    {
        return $this->model->findOrFail(hashid_decode($id))->update(['status'=>$status, 'status_update_date'=>now(), 'status_remarks'=>$remarks]);
    }

    public function getLpos():Collection
    {
        return $this->model->with(['admin', 'category', 'product', 'supplier', 'brand', 'unit'])->where('status', 'approve')->latest()->get();
    }

    public function editLpo(string $id):MaterialRequisition
    {
        return $this->model->with(['admin', 'category', 'product', 'supplier', 'brand', 'unit'])->findOrFail(hashid_decode($id));
    }

    public function updateLpo(array $arr):MaterialRequisition
    {   
        $lpo = $this->model->findOrFail(hashid_decode($arr['lpo_id']));
        $lpo->update([
            'delivered_quantity'=> $arr['delivered_quantity'] ?? null,
            'cost_price'        => $arr['cost_price'] ?? null,
            'batch_no'          => $arr['batch_no'] ?? null,
            'foc'               => $arr['foc'] ?? null,
            'invoice_no'        => $arr['invoice_no'] ?? null,
            'invoice_date'      => $arr['invoice_date'] ?? null,
        ]);
        return $lpo;
    }

    public function storeLpoProductImages(array $images, MaterialRequisition $material_requisition): void
    {   
        if(!empty($images)){
            foreach ($images as $image) {
                sleep(1);
                $path = CommonHelper::uploadSingleImage($image, 'lpo_product_images', false);
                $material_requisition->productImages()->create([
                    'filename' => $path['image'],
                ]);
            }
        }
    }

    public function updateInvoiceImage(MaterialRequisition $material_requisition, array $imageData): void
    {   
        $material_requisition->invoiceImage()->updateOrCreate(
            ['mediable_id' => $material_requisition->id, 'type'=>'document'],
            [
                'filename'     => $imageData['image'],
                'thumbnail' => $imageData['thumbnail']
            ]
        );
    }

    public function deleteLpoPorductImage($id):bool
    {
        return Media::destroy(hashid_decode($id));
    }
}