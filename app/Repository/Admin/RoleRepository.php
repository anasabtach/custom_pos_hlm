<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\RoleInterface;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository implements RoleInterface
{
    public function getPermissions():Collection
    {
        return Permission::get();
    }

    public function getRoles():Collection
    {
        return Role::withTrashed()->latest()->withLog()->get();
    }

    public function store(array $data):Role
    {   
        $role = Role::create(['name'=>$data['name'], 'slug'=>$data['slug']]);
        $role->permissions()->attach($data['permission_ids']);
        return $role;
    }

    public function edit(string $id):Role{
        return Role::with(['permissions'])->withTrashed()->findOrFail(hashid_decode($id));
    }

    public function update($data):Role
    {   
        $role = Role::withTrashed()->findOrFail(hashid_decode($data['role_id']));
        $role->name = $data['name'];
        $role->permissions()->sync($data['permission_ids']);
        $role->save();
        return $role;
    }

    public function delete(string $id):bool
    {    
        $role = Role::findOrFail(hashid_decode($id));
        $role->permissions()->detach();
        return $role->delete();
    }

    public function updateStaffPermissions(string $role, array $permissions):bool|null
    {   
        return Admin::where('user_type',$role)->update(['user_permissions'=>$permissions]);
    }

    public function remarks($remarks, $role_id):bool
    {
        return Role::where('id', hashid_decode($role_id))->update(['remarks'=>$remarks]);
    }
}