<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function UpdateDepartment($id,Request $request)
    {
        try{
            $department = $this->departmentService->UpdateDepartment($id,$request->all());
            return response()->json(['message'=>'Department has been Updated','Department'=>$department],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function DeleteDepartment($id)
    {
        try{
            $department = $this->departmentService->DeleteDepartment($id);
            return response()->json(['message'=>'Department has been deleted','Department'=>$department],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetAllDepartments()
    {
        try{
            $department = $this->departmentService->GetAllDepartments();
            return response()->json(['Departments'=>$department],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetDepartment($id)
    {
        try{
            $department = $this->departmentService->GetDepartment($id);
            return response()->json(['Department'=>$department],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
