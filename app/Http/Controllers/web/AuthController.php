<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {
        $this->authService->loginWeb($request->validated());

        return redirect()->route('auth.dashboard');
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request->validated());

        return redirect()->route('login')
            ->with('success','Admin registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
