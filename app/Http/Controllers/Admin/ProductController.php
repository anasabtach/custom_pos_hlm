<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;
use App\Services\Admin\UnitService;
use Exception;

class ProductController extends Controller
{
    protected $service;
    protected $categoryService;
    protected $unitService;

    public function __construct(ProductService $service, CategoryService $categoryService, UnitService $unitService)
    {
        $this->service         = $service;
        $this->categoryService = $categoryService;
        $this->unitService     = $unitService;
    }

    public function index(){
        $data = [
            'title'         => 'Products',
            'products'      => $this->service->getProdcuts(),
        ];
        return view('admin.product.index')->with($data);
    }

    public function add(){
        $data = [
            'title' => 'Add Product',
            'categories'    => $this->categoryService->getCategories(),
            'units'         => $this->unitService->getUnits(),
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
        $data = [
            'title'         => 'Edit Product',
            'edit_product'  => $this->service->editProduct($product_id),
            'categories'    => $this->categoryService->getCategories(),
            'units'         => $this->unitService->getUnits(),
            'is_update'     => true
        ];
        return view('admin.product.add')->with($data);
    }
}