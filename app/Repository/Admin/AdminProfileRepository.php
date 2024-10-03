<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\AuthInterface;
use App\Interfaces\Admin\AdminProfileInterface;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminProfileRepository implements AdminProfileInterface
{

    public function updateProfile(array $data):Admin
    {   
        $admin = Admin::findOrFail(hashid_decode($data['user_id']));
        $admin->update($data);
        
        return $admin;
    }

    public function updateProfileImage(Admin $admin, array $imageData): void
    {   
        $admin->profileImage()->updateOrCreate(
            ['mediable_id' => $admin->id],
            [
                'filename'     => $imageData['image'],
                'thumbnail' => $imageData['thumbnail']
            ]
        );
    }
}
