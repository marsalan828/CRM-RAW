<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function UpdateUser($id,Request $request) 
    {
        try{
            $user = $this->userService->UpdateUser($id,$request->all());
            return response()->json(['message'=>'User updated Successfully','User'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function DeleteUser($id)
    {
        try{
            $user = $this->userService->DeleteUser($id);
            return response()->json(['message'=>'User deleted successfully','User'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetAllUsers()
    {
        try{
            $user = $this->userService->GetAllUsers();
            return response()->json(['Users'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetUsers($id)
    {
        try{
            $user = $this->userService->GetUser($id);
            return response()->json(['User'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

}
