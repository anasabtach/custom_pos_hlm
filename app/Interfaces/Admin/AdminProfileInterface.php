<?php

namespace App\Interfaces\Admin;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface AdminProfileInterface
{   

    public function updateProfile(array $data):Admin;

    public function updateProfileImage(Admin $admin, array $imageData): void;
}
