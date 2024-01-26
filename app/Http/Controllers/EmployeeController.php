<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function UpdateEmployee($id,Request $request)
    {
        try{
            $employee = $this->employeeService->UpdateEmployee($id,$request->all());
            return response()->json(['message'=>'Employee has been updated','Employee'=>$employee],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function DeleteEmployee($id)
    {
        try{
            $employee = $this->employeeService->DeleteEmployee($id);
            return response()->json(['message'=>'Employee has been deleted','Employee'=>$employee],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetAllEmployees()
    {
        try{
            $employee = $this->employeeService->GetAllEmployees();
            return response()->json(['Employees'=>$employee],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetEmployee($id)
    {
        try{
            $employee = $this->employeeService->GetEmployee($id);
            return response()->json(['Employee'=>$employee],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
