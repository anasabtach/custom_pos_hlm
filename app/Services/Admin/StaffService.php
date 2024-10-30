<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\StaffInterface;

class StaffService
{
    protected $repository;

    public function __construct(StaffInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getStaff(){
        return $this->repository->getStaff();
    }

    public function store(array $data){
        
        $role                     = $this->repository->getPermissions($data['user_type']);
        $data['user_permissions'] = $role->permissions()->pluck('slug')->toArray();
        $data['user_type']        = $role->name;
        
        $admin = (isset($data['staff_id'])) 
                ? $this->repository->update(array_filter($data)) 
                : $this->repository->store($data);
        
        if(isset($data['profile_image'])){
            CommonHelper::removeImage(@$admin->profileImage->thumbnail);
            CommonHelper::removeImage(@$admin->profileImage->filename);
            $data['profile_image'] = CommonHelper::uploadSingleImage($data['profile_image'], 'profile');
            $this->repository->updateProfileImage($admin, $data['profile_image']);
        }
    }

    public function edit(string $id){
        return $this->repository->edit($id);
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

    public function updateStatus(string $id, bool $status):bool{
        return $this->repository->updateStatus($id, $status);
    }
}