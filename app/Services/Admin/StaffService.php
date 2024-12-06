<?php

namespace App\Services\Admin;

use App\Events\StaffRegisteredEvent;
use App\Helpers\CommonHelper;
use App\Interfaces\Admin\StaffInterface;
use Illuminate\Support\Str;

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
        $this->staffRegistrationMail($data['email'], $data['password']);//send email

        $role                     = $this->repository->getPermissions($data['user_type']);
        $data['user_permissions'] = $role->permissions()->pluck('slug')->toArray();
        $data['user_type']        = $role->name;
        
        if((isset($data['staff_id']))){
            $admin = $this->repository->update(array_filter($data));
            $this->staffRegistrationMail($data['email'], $data['password']);//send email
        }else{
            $admin = $this->repository->store($data);
        }

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

    public function staffRegistrationMail($email, $password){//dispatch the event
        return StaffRegisteredEvent::dispatch($email, $password);
    }

    public function resendCredentialsEmail($user_id){
        $staff      = $this->repository->getStaffMember($user_id);//get the staff memeber
        $password   = Str::random(10);
        $this->repository->update(['staff_id'=>$user_id,'email'=>$staff->email, 'password'=>$password]);//update the password
        $this->staffRegistrationMail($staff->email, $password);//send mail
    }

    public function remarks($remark, $staff_id){
        return $this->repository->remarks($remark, $staff_id);
    }
}