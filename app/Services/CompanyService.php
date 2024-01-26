<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService extends CompanyRepository {
    protected $companyRepository;
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    
    public function CreateCompany(array $data)
    {
        return $this->companyRepository->CreateCompany($data);
    }

    public function UpdateCompany($id, array $data)
    {
        return $this->companyRepository->UpdateCompany($id,$data);
    }
    
    public function DeleteCompany($id)
    {
        return $this->companyRepository->DeleteCompany($id);
    }

    public function GetAllCompanies()
    {
        return $this->companyRepository->GetAllCompanies();
    }

    public function GetCompany($id)
    {
        return $this->companyRepository->GetCompany($id);
    }
}