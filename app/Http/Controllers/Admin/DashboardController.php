<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{   
    public function __construct(public DashboardService $service)
    {
        
    }
    public function index():View{
        $data = array(
            'title'             => 'Dashboard',
            'brands_count'      => $this->service->brandCount(),
            'categories_count'  => $this->service->categoriesCount(),
            'units_count'       => $this->service->unitsCount(),
            'suppliers_count'   => $this->service->suppliersCount(),
            'customers_count'   => $this->service->customersCount(),
            'purchase_count'    => $this->service->purchaseCount(),
            'staff_count'       => $this->service->staffCount(),
            'purchase_item_sum' => $this->service->purchaseItemSum(),
            'all_sales_count'   => $this->service->allSalesCount(),
            'all_sales_sum'     => $this->service->allSaleSum(),
            'today_sales_count' => $this->service->todaySalesCount(),
            'product_sale_chart'=> $this->service->productSalesChart(),
            'customer_growth_chart'=> $this->service->customerGrowtChart(),
        );
        // dd($data['all_sales_sum']);
        return view('admin.dashboard.index')->with($data);
    }
}
