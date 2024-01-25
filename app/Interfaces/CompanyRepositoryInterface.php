<?php
namespace App\Interfaces;

interface CompanyRepositoryInterface {
    public function CreateCompany(array $data);
    public function UpdateCompany($id,array $data);
    public function DeleteCompany($id);
    public function GetAllCompanies();
    public function GetCompany($id);
}