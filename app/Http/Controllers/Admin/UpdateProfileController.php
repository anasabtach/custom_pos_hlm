<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Services\Admin\AdminProfileService;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{   
    protected $adminProfileService;

    public function __construct(AdminProfileService $service){
        $this->adminProfileService = $service;
    }

    public function profile(){
        $data = [
            'title' => 'profile',
            'user'  => auth('admin')->user()
        ];
        return view('admin.auth.profile')->with($data);
    }

    public function updateProfile(UpdateProfileRequest $req){
       
        try {
            $this->adminProfileService->updateProfile($req->validated());
            return to_route('admin.profile')->with('success', __('error_messages.admin_update_profile_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('error_messages.admin_update_profile_error'));
        }
    }
}
