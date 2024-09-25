<?php

namespace App\Interfaces\Admin;

interface AuthInterface
{
    public function login(array $credentails): bool;
}
