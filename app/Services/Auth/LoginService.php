<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginService {
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))){
            return response()->json(['message'=>'Invalid Credentials']);
        }
        $token = Auth::user()->createToken('auth-token')->plainTextToken;

        return response()->json(['message'=>'User login successful','token'=>$token],200);
    }
}