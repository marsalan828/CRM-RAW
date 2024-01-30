<?php

namespace App\Http\Controllers;

use App\Services\Auth\RegistrationService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $registrationService;
    public function __construct(RegistrationService $registrationService)
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
}
