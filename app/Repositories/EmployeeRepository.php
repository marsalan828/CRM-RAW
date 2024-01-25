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
        return DB::table('employees')->where('id',$id)->update($data);
    }
    public function DeleteEmployee($id)
    {
        return DB::table('employees')->where('id',$id)->delete();
    }
    public function GetAllEmployees()
    {
        return DB::table('employees')->get();
    }
    public function GetEmployee($id)
    {
        return DB::table('employees')->where('id',$id)->get();
    }

}