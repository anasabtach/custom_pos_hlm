<?php

namespace App\Interfaces\Admin;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface StaffInterface
{   
    public function getStaff():Collection;

    public function store(array $data):Admin;

    public function updateProfileImage(Admin $admin, array $imageData): void;

    public function getPermissions(string $role):Role;

    public function edit(string $id):Admin;

    public function update(array $data):Admin;

    public function delete($id):bool;

    public function updateStatus(string $id, bool $status):bool;

    
}