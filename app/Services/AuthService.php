<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json(['message' => 'Email belum terdaftar di sistem'], 404);
        }

        if(Hash::check($request->password, $user->password)){
            $data = [
                'name' => $user->name,
                'token' => $user->createToken('auth_token')->plainTextToken,
                'token_type' => 'Bearer'
            ];

            return [
                'message' => 'Login berhasil',
                'success' => true,
                'data' => $data,
                'status_code' => 200
            ];
        }else{
            return [
                'message' => 'Password salah',
                'success' => false,
                'data' => null,
                'status_code' => 401
            ];
        }
    }

    public function register(Request $request){
        $user = User::create($request->only(['name','email','password']));
        $data = [
            'name' => $user->name,
            'token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer'
        ];
        return [
            'message' => 'Register berhasil',
            'success' => true,
            'data' => $data,
            'status_code' => 201
        ];
    }
}