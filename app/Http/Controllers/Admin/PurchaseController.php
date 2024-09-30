<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PurchaseRequest;
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
        $data = [
            'title' => 'Purchases'
        ];
        return view('admin.purchase.index')->with($data);
    }

    public function create(){
        $data = [
            'title' => 'Add Purchase',
            'suppliers' => $this->supplierService->getSuppliers(),
        ];
        return view('admin.purchase.add')->with($data);
    }
    
    public function store(PurchaseRequest $req){
        try{
            $this->service->store($req->validated());
            return to_route('admin.purchases.index')->with('success',__('error_messages.purchase_add_success'));
        }catch(Exception $e){
            return redirect()->back()->with('success',__('error_messages.purchase_add_success'));
        }
    }
}