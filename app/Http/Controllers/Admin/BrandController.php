<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Services\Admin\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{   
    protected $service;

    public function __construct(BrandService $service){
        $this->service = $service;    
    }

    public function index(){
        rights('view-brand');
        $data = array(
            'title'         => "Brands",
            'brands'    => $this->service->getBrands()
        );
        return view('admin.brand.index')->with($data);
    }

    public function store(BrandRequest $req){
        $msg = (isset($req->brand_id)) ?  __('error_messages.brand_update_success') :  __('error_messages.brand_add_success');//send update message when brand_id is set
        try {
            $this->service->store($req->validated());
            return to_route('admin.brands.index')->with('success',$msg);
        } catch (\Exception $e) {
            return to_route('admin.brands.index')->withInput()->with('error', __('error_messages.brand_add_error'));
        }
    }

    public function edit($brand_d){
        rights('edit-brand');
        $data = array(
            'title'         => "Brands",
            'brands'    => $this->service->getBrands(),
            'edit_brand' => $this->service->edit($brand_d),
            'is_update'     => true,
        );
        return view('admin.brand.index')->with($data);
    }

    public function delete($brand_d){
        rights('delete-brand');
        $this->service->delete($brand_d);
        return to_route('admin.brands.index')->with('success', __('error_messages.brand_delete_success'));
    }
}
