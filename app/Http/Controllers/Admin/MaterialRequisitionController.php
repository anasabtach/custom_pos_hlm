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
use Illuminate\Http\Request;

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

    public function getAll(){
        $data = [
            'title'                 => 'All Material Requisition',
            'material_requistions'  => $this->service->getAllMaterialRequisitions(),
        ];
        return view('admin.material_requisition.all')->with($data);
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
            return redirect()->back()->withInput()->with('error', __('error_messages.material_requistion_add_error'));
        }
    }

    public function updateStatus(Request $req, $id, $status) {
        try{
            $this->service->updateStatus($id, $status, $req->remarks);
            return redirect()->back()->withInput()->with('success', __('error_messages.material_requistion_status_sucess'));
        }catch(Exception $e){
            return redirect()->back()->withInput()->with('error', __('error_messages.material_requistion_status_error'));
        }
    }

    public function lpo(){
        $data = [
            'title' => 'LPO',
            'lpos'  => $this->service->getLpos(),
        ];
        return view('admin.material_requisition.lpo')->with($data);
    }

    public function editLpo($id){
        $data = [
            'title'     => 'Edit LPO',
            'edit_lpo'  => $this->service->editLpo($id)
        ];
        return view('admin.material_requisition.edit_lpo')->with($data);
    }

    public function updateLpo(Request $req){
        try{
            $this->service->updateLpo($req->all());
            return redirect()->back()->withInput()->with('success', __('error_messages.lpo_update_success'));
        }catch(Exception $e){
            return redirect()->back()->withInput()->with('success', __('error_messages.lpo_update_error'));
        }
    }

    public function deleteLpoProductImage($id){
        return $this->service->deleteLpoPorductImage($id);
    }
}
