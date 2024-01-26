<?php
namespace App\Repositories;

use App\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DepartmentRepository implements DepartmentRepositoryInterface {

    public function CreateDepartment(array $data)
    {
        $companyId = Auth::company()->id;
        return DB::table('departments')->insert([
            'DepartmentName'=>$data['DepartmentName'],
            'company_id'=>$companyId,
        ]);
    }
    public function UpdateDepartment($id, array $data)
    {
        $departmentExists = DB::table('departments')->where('id',$id)->exists();
        if(!$departmentExists){
            return response()->json(['message'=>'Department does not exist'],404);
        }
        return DB::table('companies')->where('id',$id)->update($data);
    }
    public function DeleteDepartment($id)
    {
        $departmentExists = DB::table('departments')->where('id',$id)->exists();
        return DB::table('departments')->where('id',$id)->delete();
    }
    public function GetAllDepartments()
    {
        $departmentExists = DB::table('departments')->isEmpty();
        if (!$departmentExists){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return DB::table('departments')->get();
    }
    public function GetDepartment($id)
    {
        $departmentExists = DB::table('departments')->where('id',$id)->exists();
        if(!$departmentExists){
            return response()->json(['message'=>'Department does not exist'],204);
        }
        return DB::table('departments')->where('id',$id)->get();
    }   
}