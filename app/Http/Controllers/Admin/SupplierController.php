<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupplierRequest;
use App\Http\Requests\Admin\UnitRequest;
use App\Services\Admin\SupplierService;

class SupplierController extends Controller
{
    protected $service;

    public function __construct(SupplierService $service){
        $this->service = $service;    
    }

    public function index(){
        $data = array(
            'title'         => "Suppliers",
            'suppliers'     => $this->service->getSuppliers(),
        );
        return view('admin.supplier.index')->with($data);
    }

    public function create(){
        $data = [
            'title' => 'Create Supplier',
            'countries'     => $this->service->getCountries(),
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
        $data = array(
            'title'         => "Edit Supplier",
            'countries'     => $this->service->getCountries(),
            'edit_supplier' => $this->service->edit($supplier_id),
            'is_update'     => true,
        );
        return view('admin.supplier.add')->with($data);
    }

    public function delete($supplier_id){
        $this->service->delete($supplier_id);
        return to_route('admin.suppliers.index')->with('success', __('error_messages.supplier_delete_success'));
    }
}