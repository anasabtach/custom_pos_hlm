<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\StaffInterface;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class StaffRepository implements StaffInterface
{   

    public function getStaff(): Collection
    {
        return Admin::where('id', '!=', 1)->latest()->get();
    }
    public function store(array $data):Admin
    {   
        return Admin::create($data);
    }

    public function updateProfileImage(Admin $admin, array $imageData): void
    {   
        $admin->profileImage()->updateOrCreate(
            ['mediable_id' => $admin->id],
            [
                'filename'  => $imageData['image'],
                'thumbnail' => $imageData['thumbnail']
            ]
        );
    }

    public function getPermissions(string $role):Role{
        return Role::where('name',$role)->first();
    }

    public function edit(string $id):Admin
    {   
        return Admin::findOrFail(hashid_decode($id));
    }

    public function update(array $data):Admin
    {   
        $admin = Admin::findOrFail(hashid_decode($data['staff_id']));
        $admin->update($data);
        return $admin;
    }

    public function delete($id):bool
    {
        return Admin::destroy(hashid_decode($id));
    }

    public function updateStatus(string $id, bool $status): bool
    {   $status = $status == true ? '1' : '0';
        return Admin::findOrFail(hashid_decode($id))->update(['status'=>$status]);
    }

    public function getStaffMember(string $user_id):Admin
    {
        return Admin::findOrFail(hashid_decode($user_id));
    }

    
    public function staffCount():int
    {
        return Admin::count();
    }

    public function remarks($remarks, $staff_id):bool
    {
        return Admin::where('id', hashid_decode($staff_id))->update(['remarks'=>$remarks]);
    }
}