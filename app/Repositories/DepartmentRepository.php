<?php
namespace App\Repositories;

use App\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Depends;

class DepartmentRepository implements DepartmentRepositoryInterface {

    public function CreateDepartment(array $data)
    {
        $companyId = Auth::company()->id;
        return Department::create([
            'DepartmentName'=>$data['DepartmentName'],
            'company_id'=>$companyId,
        ]);
    }
    public function UpdateDepartment($id, array $data)
    {
        $department = Department::find('id',$id);
        if(!$department){
            return response()->json(['message'=>'Department does not exist'],404);
        }
        return $department->update($data);
    }
    public function DeleteDepartment($id)
    {
        $department = Department::find('id',$id);
        return $department->delete($id);
    }
    public function GetAllDepartments()
    {
        $department = Department::all();
        if (!$department){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return $department;
    }
    public function GetDepartment($id)
    {
        $department = Department::find('id',$id);
        if(!$department){
            return response()->json(['message'=>'Department does not exist'],204);
        }
        return $department->find($id);
    }   
}