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
        $userId = Auth::user()->id;
        return DB::table('companies')->where('id',$id)->update([
            'CompanyName'=>$data['CompanyName'],
            'BusinessType'=>$data['BusinessType'],
            'Industry'=>$data['Industry'],
            'RegistrationNumber'=>$data['RegistrationNumber'],
        ]);
    }

    public function DeleteCompany($id)
    {
        return DB::table('companies')->where('id',$id)->delete();
    }

    public function GetAllCompanies()
    {
        return DB::table('companies')->get();
    }

    public function GetCompany($id)
    {
        return DB::table('companies')->where('id',$id)->get();
    }
}