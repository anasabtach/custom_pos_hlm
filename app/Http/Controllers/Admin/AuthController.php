<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function loginForm(){
        $data = array(
            'title' => 'Login'
        );
        return view('admin.auth.login')->with($data);
    }

    public function login(LoginRequest $req):RedirectResponse{
        return $this->authService->login($req->validated())
        ? to_route('admin.dashboards.index')
        : redirect()->back()->withErrors(['errors' => 'Invalid login credentials']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('admin.login');
    }
}
