<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MaterialRequisitionRequest;
use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ColorService;
use App\Services\Admin\MaterialRequisitionService;
use App\Services\Admin\ProductService;
use App\Services\Admin\SupplierService;
use App\Services\Admin\UnitService;
use Exception;

class MaterialRequisitionController extends Controller
{
    protected $service;
    protected $categoryService;
    protected $productService;
    protected $supplierService;
    protected $brandService;
    protected $unitService;
    protected $colorService;

    public function __construct(
        MaterialRequisitionService $service,
        CategoryService $categoryService,
        ProductService $productService,
        SupplierService $supplierService,
        BrandService $brandService,
        UnitService $unitService,
        ColorService $colorService
    ) {
        $this->service          = $service;
        $this->categoryService  = $categoryService;
        $this->productService   = $productService;
        $this->productService   = $productService;
        $this->supplierService  = $supplierService;
        $this->brandService     = $brandService;
        $this->unitService      = $unitService;
        $this->colorService     = $colorService;
    }

    public function index()
    {
        $data = [
            'title'                 => 'Material Requisition',
            'material_requistions'  => $this->service->getMaterailRequistions(),
        ];
        return view('admin.material_requisition.index')->with($data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Material Requisition',
            'categories'    => $this->categoryService->getCategories(),
            'suppliers'     => $this->supplierService->getSuppliers(),
            'products'      => $this->productService->getPurchaseProducts(),
            'brands'        => $this->brandService->getBrands(),
            'units'         => $this->unitService->getUnits(),
            'colors'        => $this->colorService->getColors(),
        ];
        return view('admin.material_requisition.add')->with($data);
    }

    public function store(MaterialRequisitionRequest $req){

        try{
            if(isset($req->material_requisition_id)){
                $this->service->create($req->all());
                $msg = __('error_messages.material_requistion_update_success');
            }else{
                $this->service->create($req->all());
                $msg = __('error_messages.material_requistion_add_success');
            }
            return to_route('admin.material_requisitions.index')->with('success',$msg);
        }catch(Exception $e){
            dd($e->getMessage());
            return redirect()->back()->withInput()->with('error', __('error_messages.material_requistion_add_error'));
        }
    }
}
