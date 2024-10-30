<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\StaffService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffRequest;
use App\Services\Admin\RoleService;

class StaffController extends Controller
{
    protected $service;

    public function __construct(StaffService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = [
            'title' => 'Staff',
            'staffs'    => $this->service->getStaff(),
        ];
        return view('admin.staff.index')->with($data);
    }

    public function add(RoleService $roleService){
        $data = [
            'title' => 'Add Staff',
            'roles' => $roleService->getRoles(),
        ];
        return view('admin.staff.add')->with($data);
    }

    public function store(StaffRequest $req){
        try {
            $this->service->store($req->validated());
            return to_route('admin.staffs.index')->with('success', __('error_messages.staff_store_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('error_messages.staff_store_error'));
        }
    }

    public function edit($id, RoleService $roleService){
        $data = [
            'title'         => 'Staff',
            'edit_staff'    => $this->service->edit($id),
            'roles'         => $roleService->getRoles(),
            'is_edit'       => true
        ];
        return view('admin.staff.add')->with($data);
    }

    public function delete(string $id){
        $this->service->delete($id);
        return to_route('admin.staffs.index')->with('success',__('staff_delete_success'));
    }

    public function updateStatus($id, $status){
        try{
          $this->service->updateStatus($id, intval($status));
          return response()->json([
              'success'   => __('error_messages.category_status_update_success'),
          ]);
        }catch(\Exception $e){
          return response()->json([
              'error' => __('error_messages.category_status_update_failed')
          ]);
        }
    }
    
}