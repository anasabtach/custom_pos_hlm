<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RemarkRequest;
use App\Http\Requests\Admin\SupplierRequest;
use App\Http\Requests\Admin\UnitRequest;
use App\Services\Admin\ProductService;
use App\Services\Admin\SupplierService;

class SupplierController extends Controller
{
    protected $service;
    protected $productService;

    public function __construct(SupplierService $service, ProductService $productService){
        $this->service        = $service;    
        $this->productService = $productService;    
    }

    public function index(){
        rights('view-supplier');
        $data = array(
            'title'         => "Suppliers",
            'suppliers'     => $this->service->getSuppliers(),
        );
        return view('admin.supplier.index')->with($data);
    }

    public function create(){
        rights('add-supplier');
        $data = [
            'title' => 'Create Supplier',
            'countries'     => $this->service->getCountries(),
            'products'      => $this->productService->getProdcuts(),
        ];
        return view('admin.supplier.add')->with($data);
    }

    public function store(SupplierRequest $req){
        $msg = (isset($req->supplier_id)) ?  __('error_messages.supplier_update_success') :  __('error_messages.supplier_add_success');//send update message when brand_id is set
        try {
            $this->service->store($req->validated());
            return to_route('admin.suppliers.index')->with('success',$msg);
        } catch (\Exception $e) {
            return to_route('admin.suppliers.index')->withInput()->with('error', __('error_messages.supplier_add_error'));
        }
    }

    public function edit($supplier_id){
        rights('edit-supplier');
        $data = array(
            'title'         => "Edit Supplier",
            'countries'     => $this->service->getCountries(),
            'edit_supplier' => $this->service->edit($supplier_id),
            'products'      => $this->productService->getProdcuts(),
            'is_update'     => true,
        );
        $data['offered_product_ids'] = $data['edit_supplier']->getOfferedProductsIds();
        return view('admin.supplier.add')->with($data);
    }

    public function delete(RemarkRequest $req, $supplier_id){
        rights('delete-supplier');
        $this->service->remarks($req->remarks, $supplier_id);
        $this->service->delete($supplier_id);
        return to_route('admin.suppliers.index')->with('success', __('error_messages.supplier_delete_success'));
    }
}