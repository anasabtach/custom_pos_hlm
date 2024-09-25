<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\AuthInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(array $credentials):bool{
        return $this->authRepository->login($credentials);
    }

}
