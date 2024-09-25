<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UnitRequest;
use App\Services\Admin\UnitService;

class UnitController extends Controller
{
    protected $service;

    public function __construct(UnitService $service){
        $this->service = $service;    
    }

    public function index(){
        $data = array(
            'title'         => "Units",
            'units'    => $this->service->getUnits()
        );
        return view('admin.unit.index')->with($data);
    }

    public function store(UnitRequest $req){
        $msg = (isset($req->brand_id)) ?  __('error_messages.unit_update_success') :  __('error_messages.unit_add_success');//send update message when brand_id is set
        try {
            $this->service->store($req->validated());
            return to_route('admin.units.index')->with('success',$msg);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return to_route('admin.units.index')->withInput()->with('error', __('error_messages.unit_add_error'));
        }
    }

    public function edit($brand_d){
        $data = array(
            'title'         => "Brands",
            'brands'    => $this->service->getUnits(),
            'edit_brand' => $this->service->edit($brand_d),
            'is_update'     => true,
        );
        return view('admin.brand.index')->with($data);
    }

    public function delete($brand_d){
        $this->service->delete($brand_d);
        return to_route('admin.units.index')->with('success', __('error_messages.unit_delete_success'));
    }
}