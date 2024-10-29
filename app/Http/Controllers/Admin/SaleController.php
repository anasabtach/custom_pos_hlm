<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Services\Admin\SaleService;

class SaleController extends Controller
{
    protected $service;

    public function __construct(SaleService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = [
            'title' => 'Sales',
            'sales' => Sale::with(['customer'])->latest()->get(),
        ];
        return view('admin.sale.index')->with($data);
    }

    public function details($id){
        $data = [
            'title' => 'Sale Detail',
            'sale_detail'   => $this->service->saleDetail($id),
        ];
        return view('admin.sale.detail')->with($data);
    }
}