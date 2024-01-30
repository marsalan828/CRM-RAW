<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class LoginService {
    public function login($data)
    {
        if (!Auth::attempt($data)){
            return response()->json(['message'=>'Invalid Credentials']);
        }
        $token = Auth::user()->createToken('auth-token')->plainTextToken;

        return response()->json(['message'=>'User login successful','token'=>$token],200);
    }
}