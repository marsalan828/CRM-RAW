<?php

namespace App\Http\Controllers;

use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegistrationService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $registrationService;
    protected $loginService;
    protected $logoutService;
    public function __construct(
        RegistrationService $registrationService,
        LoginService $loginService,
        LogoutService $logoutService
        )
    {
        $this->registrationService = $registrationService;
    }

    public function RegisterUser(Request $request)
    {
        try{
        return $this->registrationService->CreateUser($request->all());
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function login(Request $request){
        try{
            return $this->loginService->login($request->all());
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function logout(Request $request){
        try{
            return $this->logoutService->logout($request->all());
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
