<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\RoleInterface;

class RoleService
{
    protected $repository;

    public function __construct(RoleInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getPermissions(){
        return $this->repository->getPermissions();
    }

    public function getRoles(){
        return $this->repository->getRoles();
    }

    public function store(array $data){
        $data['permission_ids'] = array_map("hashid_decode",$data['permissions']);//decode the permission ids
        $data['slug'] = CommonHelper::generateUniqueSlug($data['name'], 'roles');
        return $this->repository->store($data);
    }
    
    public function edit($id){
        return $this->repository->edit($id);
    }

    public function update(array $data){
        $data['permission_ids']   = array_map("hashid_decode",$data['permissions']);//decode the permission ids
        $role                     =  $this->repository->update($data);
        $data['user_permissions'] = $role->permissions()->pluck('slug')->toArray();
        $this->repository->updateStaffPermissions($role->name, $data['user_permissions']);//update user permissions whenever admin update the role permissions
        return $role;
    }

    public function delete(string $id){
        return $this->repository->delete($id);
    }
    // Your service methods here

    public function remarks($remark, $role_id){
        return $this->repository->remarks($remark, $role_id);
    }
}