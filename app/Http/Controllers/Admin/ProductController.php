<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\RemarkRequest;
use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ColorService;
use App\Services\Admin\ProductService;
use App\Services\Admin\SupplierService;
use App\Services\Admin\UnitService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;
    protected $categoryService;
    protected $unitService;
    protected $brandService;
    protected $supplierService;
    protected $colorService;

    public function __construct(ProductService $service, CategoryService $categoryService, UnitService $unitService, BrandService $brandService, SupplierService $supplierService, ColorService $colorService)
    {
        $this->service         = $service;
        $this->categoryService = $categoryService;
        $this->unitService     = $unitService;
        $this->brandService    = $brandService;
        $this->supplierService = $supplierService;
        $this->colorService    = $colorService; 
    }

    public function index(){
        rights('products');
        $data = [
            'title'         => 'Products',
            'products'      => $this->service->getProdcuts(),
            'categories'    => $this->categoryService->getCategories(),
            'units'         => $this->unitService->getUnits(),
            'brands'        => $this->brandService->getBrands(),
            'suppliers'     => $this->supplierService->getSuppliers(),
        ];
        return view('admin.product.index')->with($data);
    }

    public function add(){
        rights('products');
        $data = [
            'title' => 'Add Product',
            'categories'    => $this->categoryService->getCategories(),
            'units'         => $this->unitService->getUnits(),
            'brands'        => $this->brandService->getBrands(),
            'suppliers'     => $this->supplierService->getSuppliers(),
            'colors'        => $this->colorService->getColors(),
        ];
        return view('admin.product.add')->with($data    );
    }

    public function store(ProductRequest $req){ 
        try{
            if(isset($req->product_id)){
                $this->service->updateProduct($req->validated());
                $msg = __('error_messages.product_update_success');
            }else{
                $this->service->store($req->validated());
                $msg = __('error_messages.product_add_success');
            }
            return to_route('admin.products.index')->with('success',$msg);
        }catch(Exception $e){
            return redirect()->back()->withInput()->with('error', __('error_messages.product_add_error'));
        }
    }

    public function edit($product_id){
        rights('products');
        $data = [
            'title'         => 'Edit Product',
            'edit_product'  => $this->service->editProduct($product_id),
            'categories'    => $this->categoryService->getCategories(),
            'units'         => $this->unitService->getUnits(),
            'brands'        => $this->brandService->getBrands(),
            'suppliers'     => $this->supplierService->getSuppliers(),
            'colors'        => $this->colorService->getColors(),
            'is_update'     => true
        ];
        return view('admin.product.add')->with($data);
    }

    public function delete(RemarkRequest $req, $product_id){
        rights('products');
        try{
            $this->service->remarks($req->remarks, $product_id);
            $this->service->delete($product_id);
            return redirect()->back()->with('success', __('error_messages.product_delete_success'));
        }catch(Exception $e){
            return redirect()->back()->with('error', __('error_messages.product_delete_error'));
        }
        $this->service->delete($product_id);
    }

    public function searchProducts(Request $req){
        return response()->json([
            'items' => $this->service->searchProducts($req->search),
        ]);
    }

    public function productAndVariationRow(Request $req){
        return response()->json([
            'html'  => view('admin.product.product_and_variation_row', [
                'data' =>  $this->service->productAndVariationRow($req->product_id, $req->product_variation_id),
            ])->render(),
        ]);
    }

    public function deletedProducts(){
        rights('products');
        $data = [
            'title'         => 'Products',
            'products'      => $this->service->getDeletedProdcuts(),
            'categories'    => $this->categoryService->getCategories(),
            'units'         => $this->unitService->getUnits(),
            'brands'        => $this->brandService->getBrands(),
        ];
        return view('admin.product.deleted_products')->with($data);
    }

    public function saveAsDraft(Request $req){
        try{
            $this->service->saveAsDraft($req->all());
            return to_route('admin.products.index')->with('success', __('error_messages.product_draft_success'));
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }    
}