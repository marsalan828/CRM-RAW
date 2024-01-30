<?php

namespace App\Repositories;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeRepositoryInterface {
    public function CreateEmployee(array $data)
    {
        return Employee::create($data);
    }
    public function UpdateEmployee($id,array $data)
    {
        $employee = Employee::find('id',$id);
        if (!$employee){
            return response()->json(['message'=>'Employee does not exist'],404); 
        }
        return $employee->update($data);
    }
    public function DeleteEmployee($id)
    {
        $employee = Employee::find('id',$id);
        if (!$employee){
            return response()->json(['message'=>'Employee does not exist'],404);
        }
        return $employee->delete($id);
    }
    public function GetAllEmployees()
    {
        $employee = Employee::all();
        if (!$employee){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return $employee;
    }
    public function GetEmployee($id)
    {
        $employee = Employee::find($id);
        if (!$employee){
            return response()->json(['message'=>'Employee does not exist'],404);
        }
        return $employee->find($id);
    }

}