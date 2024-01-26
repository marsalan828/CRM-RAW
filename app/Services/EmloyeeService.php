<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeService extends EmployeeRepository {
    protected $employeeRepository;
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function CreateEmployee(array $data)
    {
        return $this->employeeRepository->CreateEmployee($data);
    }

    public function UpdateEmployee($id, array $data)
    {
        return $this->employeeRepository->UpdateEmployee($id,$data);
    }

    public function DeleteEmployee($id)
    {
        return $this->employeeRepository->DeleteEmployee($id);
    }

    public function GetAllEmployees()
    {
        return $this->employeeRepository->GetAllEmployees();
    }

    public function GetEmployee($id)
    {
        return $this->employeeRepository->GetEmployee($id);
    }
    
}