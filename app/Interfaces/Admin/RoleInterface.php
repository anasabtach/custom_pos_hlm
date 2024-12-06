<?php

namespace App\Interfaces\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface RoleInterface
{
    public function getPermissions():Collection;

    public function getRoles():Collection;

    public function store(array $data):Role;

    public function edit(string $id):Role;

    public function update(array $data):Role;

    public function delete(string $id):bool;

    public function updateStaffPermissions(string $role, array $permissions):bool|null;

    public function remarks($remarks, $role_id):bool;

}