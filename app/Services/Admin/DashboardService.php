<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\DashboardInterface;
use App\Models\PurchaseItem;
use App\Repository\Admin\BrandRepository;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\CustomerRepository;
use App\Repository\Admin\ProductRepository;
use App\Repository\Admin\PurchaseItemRepository;
use App\Repository\Admin\PurchaseRepository;
use App\Repository\Admin\SaleRepository;
use App\Repository\Admin\StaffRepository;
use App\Repository\Admin\SupplierRepository;
use App\Repository\Admin\UnitRepository;
use ReflectionFunctionAbstract;

class DashboardService
{
    public $repository;
    public $saleRepository;
    public $brand;
    public $category;
    public $unit;
    public $supplier;
    public $customer;
    public $purchase;
    public $staff;
    public $purchase_item;
    public $product;
    
    public function __construct(DashboardInterface $repository, 
        SaleRepository $saleRepository, 
        BrandRepository $brand, 
        CategoryRepository $category, 
        UnitRepository $unit, 
        SupplierRepository $supplier,
        CustomerRepository $customer,
        PurchaseRepository $purchase,
        StaffRepository $staff,
        PurchaseItemRepository $purchase_item,
        ProductRepository $product
    )
    {
        $this->repository       = $repository;
        $this->saleRepository   = $saleRepository;
        $this->brand            = $brand;
        $this->category         = $category;
        $this->unit             = $unit;
        $this->supplier         = $supplier;
        $this->customer         = $customer;
        $this->purchase         = $purchase;
        $this->staff            = $staff;
        $this->purchase_item    = $purchase_item;
        $this->product          = $product;
    }

    public function allSalesCount(){
        return $this->saleRepository->allSalesCount();
    }

    public function todaySalesCount(){
        return $this->saleRepository->todaySalesCount();
    }

    public function brandCount(){
        return $this->brand->brandsCount();
    }

    public function categoriesCount(){
        return $this->category->categoriesCount();
    }

    public function unitsCount(){
        return $this->unit->unitsCount();
    }

    public function suppliersCount(){
        return $this->supplier->suppliersCount();
    }

    public function customersCount(){
        return $this->customer->customersCount();
    }
    public function purchaseCount(){
        return $this->purchase->purchaseCount();
    }

    public function staffCount(){
        return $this->staff->staffCount();
    } 

    public function purchaseItemSum(){
        return $this->purchase_item->purchaseItemSum();
    }

    public function allSaleSum(){
        return $this->saleRepository->allSaleSum();
    }

    public function productSalesChart(){
        return $this->product->productSalesChart();
    }

    public function customerGrowtChart(){
        return $this->customer->customerGrowthChart();
    }

}
