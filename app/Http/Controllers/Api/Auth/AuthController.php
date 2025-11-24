<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return ApiResponse::successResponse([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return ApiResponse::successResponse([
                'message' => 'Login successful',
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('auth_token')->plainTextToken,
            ],200);
        }

        return ApiResponse::errorResponse('Credenciales inválidas', 401);
    }

    // public function logout(): JsonResponse
    // {

    // }
}
