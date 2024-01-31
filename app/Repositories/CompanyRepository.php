<?php
namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface {

    public function CreateCompany(array $data)
    {
        return Company::create($data);
    }

    public function UpdateCompany($id, array $data)
    {   
        $company = DB::find($id);
        if (!$company){
            return response()->json(['message'=>'company does not exist'],404);
        }
        $userId = Auth::id();
        if (!$userId){
            return response()->json(['message'=>'User is not Logged in'],401);
        }
        return $company->update([
            'CompanyName'=>$data['CompanyName'],
            'BusinessType'=>$data['BusinessType'],
            'Industry'=>$data['Industry'],
            'RegistrationNumber'=>$data['RegistrationNumber'],
        ]);
    }

    public function DeleteCompany($id)
    {
        $company = Company::find($id);
        if (!$company){
            return response()->json(['message'=>'Company does not exist'],404);
        }
        return $company->delete($id);
    }

    public function GetAllCompanies()
    {
        $company = Company::all();
        if ($company->isEmpty()){
            return response()->json(['message'=>'Database is empty'],204);
        }
        return $company;
    }

    public function GetCompany($id)
    {
        $company = Company::find($id);
        if (!$company){
            return response()->json(['message'=>'Company does not exist'],404);
        }
        return $company->find($id);
    }
}