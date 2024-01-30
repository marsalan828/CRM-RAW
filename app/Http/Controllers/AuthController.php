<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Services\Auth\EmailVerificationService;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegistrationService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $registrationService;
    protected $loginService;
    protected $logoutService;
    protected $emailVerificationService;
    public function __construct(
        RegistrationService $registrationService,
        LoginService $loginService,
        LogoutService $logoutService,
        EmailVerificationService $emailVerificationService
        )
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
        $this->logoutService = $logoutService;
        $this->emailVerificationService = $emailVerificationService;
    }

    public function RegisterUser(Request $request)
    {
        try{
        return $this->registrationService->CreateUser($request->all());
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function login(UserLoginRequest $request){
        try{
            return $this->loginService->login($request);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function logout(Request $request){
        try{
            return $this->logoutService->logout($request);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function emailVerify(Request $request)
    {
        try{
            return $this->emailVerificationService->verifyEmail($request);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
