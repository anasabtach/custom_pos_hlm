<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\AuthInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{

    public function login(array $credentials):bool
    {
        return Auth::guard('admin')->attempt($credentials);
    }
}
