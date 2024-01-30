<?php

namespace App\Services;
use App\Repositories\DepartmentRepository;

class DepartmentService extends DepartmentRepository {
    protected $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function CreateDepartment(array $data)
    {
        return $this->departmentRepository->CreateDepartment($data);
    }

    public function UpdateDepartment($id, array $data)
    {
        return $this->departmentRepository->UpdateDepartment($id,$data);
    }

    public function DeleteDepartment($id)
    {
        return $this->departmentRepository->DeleteDepartment($id);
    }

    public function GetAllDepartments()
    {
        return $this->departmentRepository->GetAllDepartments();
    }

    public function GetDepartment($id)
    {
        return $this->departmentRepository->GetDepartment($id);
    }
}