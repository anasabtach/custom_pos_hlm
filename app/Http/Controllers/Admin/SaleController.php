<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Services\Admin\CustomerService;
use App\Services\Admin\SaleService;

class SaleController extends Controller
{
    protected $service;
    protected $customer;

    public function __construct(SaleService $service, CustomerService $customer)
    {
        $this->service = $service;
        $this->customer = $customer;
    }

    public function index(){
        rights('sales');
        $data = [
            'title'     => 'Sales',
            'sales'     => Sale::with(['customer'])->latest()->get(),
            'customers' => $this->customer->getCustomers(),
        ];
        return view('admin.sale.index')->with($data);
    }

    public function details($id){
        rights('sales');
        $data = [
            'title' => 'Sale Detail',
            'sale_detail'   => $this->service->saleDetail($id),
        ];
        return view('admin.sale.detail')->with($data);
    }
}