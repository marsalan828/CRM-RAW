<?php

namespace App\Repositories;

use App\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeRepositoryInterface {
    public function CreateEmployee(array $data)
    {
        $deptId = Auth::department()->id;
        $userId = Auth::user()->id;
        return DB::table('employees')->insert([
            'Name'=>$data['Name'],
            'Phone_number'=>$data['Phone_number'],
            'DOB'=>$data['DOB'],
            'Gender'=>$data['Gender'],
            'deparment_id'=>$deptId,
            'user_id'=>$userId 
        ]);
    }
    public function UpdateEmployee($id,array $data)
    {
        $employeeExists = DB::table('employee')->where('id',$id)->exists();
        if (!$employeeExists){
            return response()->json(['message'=>'Employee does not exist'],404); 
        }
        return DB::table('employees')->where('id',$id)->update($data);
    }
    public function DeleteEmployee($id)
    {
        $employeeExists = DB::table('emloyees')->where('id',$id)->exists();
        if (!$employeeExists){
            return response()->json(['message'=>'Employee does not exist'],404);
        }
        return DB::table('employees')->where('id',$id)->delete();
    }
    public function GetAllEmployees()
    {
        $employeeExists = DB::table('employees')->isEmpty();
        if (!$employeeExists){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return DB::table('employees')->get();
    }
    public function GetEmployee($id)
    {
        $employeeExists = DB::table('employees')->where('id',$id)->exists();
        if (!$employeeExists){
            return response()->json(['message'=>'Employee does not exist'],404);
        }
        return DB::table('employees')->where('id',$id)->get();
    }

}