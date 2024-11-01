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
        rights('view-unit');
        $data = array(
            'title'         => "Units",
            'units'    => $this->service->getUnits(),
        );
        return view('admin.unit.index')->with($data);
    }

    public function store(UnitRequest $req){
        $msg = (isset($req->brand_id)) ?  __('error_messages.unit_update_success') :  __('error_messages.unit_add_success');//send update message when brand_id is set
        try {
            $this->service->store($req->validated());
            return to_route('admin.units.index')->with('success',$msg);
        } catch (\Exception $e) {
            return to_route('admin.units.index')->withInput()->with('error', __('error_messages.unit_add_error'));
        }
    }

    public function edit($unit_id){
        rights('edit-unit');
        $data = array(
            'title'         => "Brands",
            'units'    => $this->service->getUnits(),
            'edit_unit' => $this->service->edit($unit_id),
            'is_update'     => true,
        );
        return view('admin.unit.index')->with($data);
    }

    public function delete($unit_id){
        rights('delete-unit');
        $this->service->delete($unit_id);
        return to_route('admin.units.index')->with('success', __('error_messages.unit_delete_success'));
    }
}