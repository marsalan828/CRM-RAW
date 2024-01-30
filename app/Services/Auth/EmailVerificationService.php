<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationService {
    public function verifyEmail(Request $request)
    {
        if (!Auth::check()){
            return response()->json(['message'=>'user is not authenticated']);
        }
        $user = Auth::user();
        $userEmail = $user->email;

        if (!$userEmail)
        {
            return response()->json(['message'=>'User not found'],404);
        }

        $enteredOtp = $request->input('otp');
        $storedOtp = $user->otp;
        var_dump($storedOtp);


        if($storedOtp === $enteredOtp)
        {
            $user->update(['otp'=>null,'email_verified_at'=>now()]);
            return response()->json(['message'=>'Otp verified successfully']);
        }else
        {
            return response()->json(['message'=>'Invalid otp'],422);
        }

    }
}