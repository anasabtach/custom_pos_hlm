<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Services\Admin\RoleService;

class RoleController extends Controller
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = [
            'title' => 'Roles',
            'roles' => $this->service->getRoles(),
            'permissions'   => $this->service->getPermissions(),
        ];
        return view('admin.roles.index')->with($data);
    }

    public function store(RoleRequest $req){
        try {
            if(isset($req->role_id)){
                $this->service->update($req->validated());
            }else{                
                $this->service->store($req->validated());
            }
            return to_route('admin.roles.index')->with('success', 'Role has been added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'some error occured');
        }
    }

    public function edit($id){
        $data = [
            'title'         => 'Edit Role',
            'roles'         => $this->service->getRoles(),
            'permissions'   => $this->service->getPermissions(),
            'edit_role'     => $this->service->edit($id),
            'is_edit'       => true,
        ];
        return view('admin.roles.index')->with($data);
    }

    public function delete($id){
        $this->service->delete($id);
        return to_route('admin.roles.index')->with('success', 'Role and its permissions deleted successfullys');
    }
}