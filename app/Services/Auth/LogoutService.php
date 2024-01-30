<?php

namespace App\Services\Auth;

class LogoutService {
    public function logout($data)
    {
        try{
            $user = $data->user();

        if (!$user){
            throw new \Exception('User not found');
        }
        $user->tokens()->delete();
        return response()->json(['message'=>'User has logged out successfully'],200);
    }catch(\Exception $e){
        return response()->json(['message'=>$e->getMessage()]);
    }   
    }
}