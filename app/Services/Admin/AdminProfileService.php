<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\AdminProfileInterface;
use App\Repository\Admin\AdminProfileRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminProfileService{
    
    protected $adminProfileRepository;

    public function __construct(AdminProfileInterface $adminProfileInterface){
        $this->adminProfileRepository = $adminProfileInterface;
    }

    public function updateProfile(array $data){
        $admin = $this->adminProfileRepository->updateProfile($data);
        
        if(isset($data['profile_image'])){
            CommonHelper::removeImage(@$admin->profileImage->thumbnail);
            CommonHelper::removeImage(@$admin->profileImage->filename);
            $data['profile_image'] = CommonHelper::uploadSingleImage($data['profile_image'], 'profile');
            $this->adminProfileRepository->updateProfileImage($admin, $data['profile_image']);

        }
    }

}