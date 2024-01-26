<?php
namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\User;

class CompanyRepository implements CompanyRepositoryInterface {

    public function CreateCompany(array $data)
    {
        $userId = Auth::user()->id;
        if (!$userId){
            return response()->json(['message'=>'User is not Logged in'],401);
        }
        return DB::table('companies')->insert([
            'CompanyName'=>$data['CompanyName'],
            'BusinessType'=>$data['BusinessType'],
            'Industry'=>$data['Industry'],
            'RegistrationNumber'=>$data['RegistrationNumber'],
            'user_id'=>$userId
        ]);
    }

    public function UpdateCompany($id, array $data)
    {   
        $companyExists = DB::table('companies')->where('id',$id)->exists();
        if (!$companyExists){
            return response()->json(['message'=>'company does not exist'],404);
        }
        $userId = Auth::user()->id;
        if (!$userId){
            return response()->json(['message'=>'User is not Logged in'],401);
        }
        return DB::table('companies')->where('id',$id)->update([
            'CompanyName'=>$data['CompanyName'],
            'BusinessType'=>$data['BusinessType'],
            'Industry'=>$data['Industry'],
            'RegistrationNumber'=>$data['RegistrationNumber'],
        ]);
    }

    public function DeleteCompany($id)
    {
        $companyExists = DB::table('companies')->where('id',$id)->exists();
        if (!$companyExists){
            return response()->json(['message'=>'Company does not exist'],404);
        }
        return DB::table('companies')->where('id',$id)->delete();
    }

    public function GetAllCompanies()
    {
        $DBExist = DB::table('companies')->isEmpty();
        if ($DBExist){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return DB::table('companies')->get();
    }

    public function GetCompany($id)
    {
        $companyExists = DB::table('companies')->where('id',$id)->exists();
        if (!$companyExists){
            return response()->json(['message'=>'Company does not exist'],404);
        }
        return DB::table('companies')->where('id',$id)->get();
    }
}