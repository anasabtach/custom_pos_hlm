<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PurchaseRequest;
use App\Http\Requests\Admin\RemarkRequest;
use App\Services\Admin\PurchaseService;
use App\Services\Admin\SupplierService;
use Exception;

class PurchaseController extends Controller
{
    protected $service;
    protected $supplierService;

    public function __construct(PurchaseService $service, SupplierService $supplierService)
    {
        $this->service  = $service;
        $this->supplierService = $supplierService;
    }

    public function index(){
        rights('view-purchase');
        $data = [
            'title'     => 'Purchases',
            'purchases' => $this->service->getPurchases(),
            'suppliers' => $this->supplierService->getSuppliers(),
        ];
        return view('admin.purchase.index')->with($data);
    }

    public function create(){
        rights('add-purchase');
        $data = [
            'title' => 'Add Purchase',
            'suppliers' => $this->supplierService->getSuppliers(),
        ];
        return view('admin.purchase.add')->with($data);
    }
    
    public function store(PurchaseRequest $req){
        if(isset($req->purchase_id)){
            $success_msg = __('error_messages.purchase_update_success');
            $error_msg = __('error_messages.purchase_update_error');
        }else{
            $success_msg = __('error_messages.purchase_add_success');
            $error_msg = __('error_messages.purchase_add_error');
        }
        try{
            (isset($req->purchase_id)) ? $this->service->update($req->validated()) : $this->service->store($req->validated());
            return to_route('admin.purchases.index')->with('success',$success_msg);
        }catch(Exception $e){
            return redirect()->back()->with('error',$error_msg);
        }
    }

    public function details($purchase_id){
        $data = [
            'title'     => 'Purchase Details',
            'detail'    => $this->service->details($purchase_id),
        ];
        return view('admin.purchase.details')->with($data);
    }

    public function edit($purchase_id){
        rights('edit-purchase');
        $data = [
            'title'            => 'Edit Product',
            'edit_purchase'    => $this->service->edit($purchase_id),
            'suppliers'        => $this->supplierService->getSuppliers(),
            'is_update'        => true
        ];
        return view('admin.purchase.add')->with($data);
    }

    public function delete(RemarkRequest $req, $purchase_id){
        rights('delete-purchase');
        $this->service->remarks($req->remarks, $purchase_id);
        $this->service->delete($purchase_id);
        return to_route('admin.purchases.index')->with('success',__('error_messages.purchase_delete_success'));
    }
}