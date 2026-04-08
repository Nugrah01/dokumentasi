<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => Hash::make($data['password']),
            'role' => 'admin'
        ]);

        $token = $user->createToken('admin-token')->plainTextToken;

        return compact('user','token');
    }

    public function login(array $credentials): array
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials']
            ]);
        }

        $user = Auth::user();

        if ($user->role !== 'admin') {
            throw ValidationException::withMessages([
                'email' => ['Unauthorized role']
            ]);
        }

        $token = $user->createToken('admin-token')->plainTextToken;

        return compact('user','token');
    }

    public function loginWeb(array $credentials): void
{
    if (!Auth::attempt($credentials)) {
        throw ValidationException::withMessages([
            'email' => ['Invalid credentials']
        ]);
    }

    if (Auth::user()->role !== 'admin') {
        Auth::logout();
        throw ValidationException::withMessages([
            'email' => ['Unauthorized role']
        ]);
    }
}
}