<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function UpdateCompany($id,Request $request)
    {
        try{
            $company = $this->companyService->CreateCompany($id,$request->all());
            return response()->json(['message'=>'Company has been created','Company'=>$company],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function DeleteCompany($id)
    {
        try{
            $company = $this->companyService->DeleteCompany($id);
            return response()->json(['message'=>'Company has been deleted','Company'=>$company],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetAllCompanies()
    {
        try{
            $company = $this->companyService->GetAllCompanies();
            return response()->json(['Companies'=>$company],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function GetCompany($id){
        try{
            $company = $this->companyService->GetCompany($id);
            return response()->json(['Company'=>$company],200);
        }catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
