<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request){
        $data = $this->authService->login($request);
        return response()->json($data, $data['status_code']);
    }

    public function register(RegisterRequest $request){
        $data = $this->authService->register($request);
        return response()->json($data, $data['status_code']);
    }
}
