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
        return DB::table('companies')->where('id',$id)->update($data);
    }
    public function DeleteDepartment($id)
    {
        return DB::table('companies')->where('id',$id)->delete();
    }
    public function GetAllDepartments()
    {
        return DB::table('companies')->get();
    }
    public function GetDepartment($id)
    {
        return DB::table('companies')->where('id',$id)->get();
    }   
}